<?php

require '../app/conection.php';


class UserValidator extends Database{

    
    protected $errors = [];

    public function __construct(protected $data) {
    
    $this->data = $data;
    }

    public function validate() {
        if (empty($this->data['name'])) {
            $this->addError('name', 'Nome é obrigatório.');
        }

        if (empty($this->data['lastname'])) {
            $this->addError('lastname', 'Sobrenome é obrigatório.');
        }

        if (empty($this->data['email'])) {
            $this->addError('email', 'Email é obrigatório.');
        } else {
            if (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'Formato do email inválido EX: email@email.com.br');
            }
        }

        if (empty($this->data['password'])) {
            $this->addError('password', 'Senha é obrigatória.');
        } else {
            if (strlen($this->data['password']) < 6) {
                $this->addError('password', 'A senha deve ter pelo menos 6 caracteres.');
            }
        }

        if (empty($this->data['repeatpassword'])) {
            $this->addError('repeatpassword', 'Por favor repita sua senha.');
        } else {
            if ($this->data['password'] !== $this->data['repeatpassword']) {
                $this->addError('repeatpassword', 'As senhas não coincidem.');
            }
        }

        return $this->errors;
    }

    protected function addError($field, $message) {
        $this->errors[$field] = $message;
    }

}
