<?php

// Interface para o observador
interface Observador {
    public function atualizar($mensagem);
}

// Classe concreta de um observador
class EmailNotificacao implements Observador {
    public function atualizar($mensagem) {
        echo "Notificação por Email: $mensagem\n";
    }
}

class SMSNotificacao implements Observador {
    public function atualizar($mensagem) {
        echo "Notificação por SMS: $mensagem\n";
    }
}

// Classe observada (sujeito)
class Evento {
    private $observadores = [];

    public function adicionarObservador(Observador $observador) {
        $this->observadores[] = $observador;
    }

    public function notificar($mensagem) {
        foreach ($this->observadores as $observador) {
            $observador->atualizar($mensagem);
        }
    }

    public function novoEvento($descricao) {
        echo "Novo evento: $descricao\n";
        $this->notificar($descricao);
    }
}

// Uso
$evento = new Evento();

// Adicionando observadores
$evento->adicionarObservador(new EmailNotificacao());
$evento->adicionarObservador(new SMSNotificacao());

// Gerando um evento
$evento->novoEvento("Atualização de sistema disponível.");