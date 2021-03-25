<?php

namespace App\Controllers;

use App\Controllers\AuthController;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Auth extends AuthController
{
    public function signup()
    {
        $validation = \config\Services::validation();
        return view('auth/sign-up', compact('validation'));
    }
    public function up()
    {
        if (!$this->validate([
            '_email'     => [
                'rules'     => 'required|valid_email|is_unique[auth.email]',
                'errors'    => [
                    'required'      => 'Form email harus diisi',
                    'valid_email'   => 'Email tidak valid',
                    'is_unique'     => 'Email sudah terdaftar',
                ]
            ],
            '_name'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Form nama harus diisi',
                ]
            ],
            '_phone'     => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'Form phone harus diisi',
                    'numeric'       => 'Form phone harus angka',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $pin        = date('d') . random_string('alnum', 5) . date('m') . random_string('alnum', 5);
        $password   = random_string('alnum', 6);
        $this->auth->save([
            'pin'           => $pin,
            'name'          => htmlspecialchars($this->request->getPost('_name')),
            'email'         => htmlspecialchars($this->request->getPost('_email')),
            'password'      => password_hash($password, PASSWORD_DEFAULT),
            'phone'         => htmlspecialchars($this->request->getPost('_phone'))
        ]);
        /**
         * Passing data ke email verifikasi
         */
        $data = [
            'pin'           => $pin,
            'name'          => htmlspecialchars($this->request->getPost('_name')),
            'email'         => htmlspecialchars($this->request->getPost('_email')),
            'password'      => $password,
            'phone'         => htmlspecialchars($this->request->getPost('_phone'))
        ];
        $html = view('auth/template/email', $data);
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug    = SMTP::DEBUG_SERVER;                     //Enable verbose debug output
            $mail->isSMTP();                                              //Send using SMTP
            $mail->Host         = 'smtp.googlemail.com';                  //Set the SMTP server to send through
            $mail->SMTPAuth     = true;                                   //Enable SMTP authentication
            $mail->Username     = _EMAIL;                  //SMTP username
            $mail->Password     = _PASSWORD;                           //SMTP password
            $mail->SMTPSecure   = 'ssl';                                  //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port         = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom(_EMAIL, _APP);
            $mail->addAddress($this->request->getPost('_email'), $this->request->getPost('_name'));     //Add a recipient
            $mail->addReplyTo(_EMAIL, _APP);

            //Content
            $mail->isHTML(true);                                              //Set email format to HTML
            $mail->Subject = 'Verifikasi Email' . ' ' . _APP;
            $mail->Body    = $html;

            $mail->send();
            return redirect()->to(route_to('verify', $pin));
        } catch (Exception $e) {
            return redirect()->back()->withInput();
        }
    }

    public function verify($pin)
    {
        $data = $this->auth->where('pin', $pin)->first();
        return view('auth/verify', compact('data'));
    }

    public function signin()
    {
        $captcha    = random_string('alnum', 3);
        return view('auth/sign-in', compact('captcha'));
    }
    public function in()
    {
        if ($this->request->getPost('_captcha') == $this->request->getPost('_verifikasi')) :
            $email      = $this->request->getPost('_email');
            $password   = $this->request->getPost('_password');
            $auth       = $this->auth->where('email', $email)->first();
            if ($auth) :
                if (password_verify($password, $auth['password'])) :
                    session()->set('email', $auth['email']);
                    session()->set('password', $auth['password']);
                    session()->set('_dv', 'auth');
                    // jika berhasil
                    return redirect()->to(route_to('dashboard'));
                else :
                    // jika password salah
                    session()->setFlashdata('error', 'Password anda salah');
                    return redirect()->back()->withInput();
                endif;
            else :
                // jika email salah
                session()->setFlashdata('error', 'Email tidak terdaftar');
                return redirect()->back();
            endif;
        else :
            // j ika captcha salah
            session()->setFlashdata('error', 'Ada kesalahan dalam captcha');
            return redirect()->back()->withInput();
        endif;
    }

    public function forgot()
    {
        return view('auth/forgot');
    }

    public function for()
    {
        $email      = $this->request->getPost('_email');
        $auth       = $this->auth->where('email', $email)->first();
        if (!$auth) {
            session()->setFlashdata('error', 'Email tidak terdaftar');
            return redirect()->back();
        }
        /**
         * Jika email terdaftar
         * kirim email
         */
        $data = [
            'pin'       => $auth['pin']
        ];
        $html = view('auth/template/forgot', $data);
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug    = SMTP::DEBUG_SERVER;                     //Enable verbose debug output
            $mail->isSMTP();                                              //Send using SMTP
            $mail->Host         = 'smtp.googlemail.com';                  //Set the SMTP server to send through
            $mail->SMTPAuth     = true;                                   //Enable SMTP authentication
            $mail->Username     = _EMAIL;                                 //SMTP username
            $mail->Password     = _PASSWORD;                              //SMTP password
            $mail->SMTPSecure   = 'ssl';                                  //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port         = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom(_EMAIL, _APP);
            $mail->addAddress($this->request->getPost('_email'), $auth['name']);     //Add a recipient
            $mail->addReplyTo(_EMAIL, _APP);

            //Content
            $mail->isHTML(true);                                              //Set email format to HTML
            $mail->Subject = 'Forgot Email' . ' ' . _APP;
            $mail->Body    = $html;

            $mail->send();
            session()->set('_forgotxxyy', 'forgot');
            return redirect()->to(route_to('verifyforgot'));
        } catch (Exception $e) {
            return redirect()->back()->withInput();
        }
    }

    public function verifyforgot()
    {
        return view('auth/verify-forgot');
    }

    public function updatepassword($pin)
    {
        $data = [
            'auth'       => $this->auth->where('pin', $pin)->first(),
            'validation' => \config\Services::validation()
        ];
        return view('auth/update-password', $data);
    }

    public function uppass()
    {
        if (!$this->validate([
            '_password1'     => [
                'rules'     => 'required|min_length[4]',
                'errors'    => [
                    'required'      => 'Password harus diisi',
                    'min_length'    => 'Minimal 4 karakter'
                ]
            ],
            '_password2'     => [
                'rules'     => 'required|matches[_password1]',
                'errors'    => [
                    'required'      => 'Password harus diisi',
                    'matches'       => 'Password  tidak sama',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $this->auth->save([
            'id'            => htmlspecialchars($this->request->getPost('_id')),
            'pin'           => htmlspecialchars($this->request->getPost('_pin')),
            'name'          => htmlspecialchars($this->request->getPost('_name')),
            'email'         => htmlspecialchars($this->request->getPost('_email')),
            'password'      => password_hash($this->request->getPost('_password1'), PASSWORD_DEFAULT),
            'phone'         => htmlspecialchars($this->request->getPost('_phone'))
        ]);
        session()->setFlashdata('success', 'Password berhasil dirubah');
        session()->destroy();
        return redirect()->to(route_to('signin'));
    }

    public function destroy()
    {
        session()->destroy();
        return redirect()->to(route_to('signin'));
    }
}
