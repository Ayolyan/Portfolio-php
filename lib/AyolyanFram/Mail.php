<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 28/08/2018
 * Time: 22:45
 */

namespace AyolyanFram;


class Mail {

    // Mail header
    protected $destinationEmail;
    protected $replyer;
    protected $replyEmail;
    protected $sender;
    protected $senderEmail;
    protected $priority;

    // Mail Content
    protected $subject;
    protected $charset = 'UTF-8';
    protected $textMsg;
    protected $htmlMsg;

    const MAX_PRIORITY = 1;
    const HIGH_PRIORITY = 2;
    const NORMAL_PRIORITY = 3;
    const LOW_PRIORITY = 4;
    const MIN_PRIORITY = 5;

    public function __construct($from, $to, $message, $subject = 'No Subject', array $options = []) {
        $this->setDestinationEmail($to);
        $this->setSenderEmail($from);
        $this->setSubject($subject);
        $this->setTextMsg($message);

        if (isset($options['charset'])) {
            $this->setCharset($options['charset']);
        }

        if (isset($options['htmlMsg'])) {
            $this->setHtmlMsg($options['htmlMsg']);
        }

        if (isset($options['priority'])) {
            $this->setPriority($options['priority']);
        } else {
            $this->setPriority(self::NORMAL_PRIORITY);
        }

        if (isset($options['replyEmail'])) {
            $this->setReplyEmail($options['replyEmail']);
        } else {
            $this->setReplyEmail($this->senderEmail);
        }

        if (isset($options['sender'])) {
            $this->setSender($options['sender']);
        } else {
            $this->setSenderEmail(strtok($this->senderEmail, '@'));
        }

        if (isset($options['replyer'])) {
            $this->setReplyer($options['replyer']);
        } elseif (isset($options['replyEmail'])) {
            $this->setReplyer(strtok($options['replyEmail'], '@'));
        } else {
            $this->setReplyer($this->sender);
        }

    }

    public function send() {
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $this->destinationEmail)) {
            $lineBreak = '\r\n';
        } else {
            $lineBreak = '\n';
        }

        $boundary = '-----=' . md5(rand());

        $header  = 'From: "' . $this->sender . '"<' . $this->senderEmail . '>' . $lineBreak;
        $header .= 'Reply-to: "' . $this->replyer . '"<' . $this->replyEmail . '>' . $lineBreak;
        $header .= 'MIME-Version: 1.0' . $lineBreak;
        $header .= 'X-Priority: '. $this->priority . $lineBreak;
        $header .= 'Content-Type: multipart/alternative;' . $lineBreak;
        $header .= 'boundary="' . $boundary . '"' . $lineBreak;

        $message  = $lineBreak . '--' . $boundary . $lineBreak;
        $message .= 'Content-Type: text/plain; charset=' . $this->charset . $lineBreak;
        $message .= 'Content-Transfer-Encoding: 8bit' . $lineBreak;
        $message .= $lineBreak . $this->textMsg . $lineBreak;
        $message .= $lineBreak . '--' . $boundary . $lineBreak;

        if (!empty($htmlMsg)) {
            $message .= 'Content-Type: text/plain; charset=' . $this->charset . $lineBreak;
            $message .= 'Content-Transfer-Encoding: 8bit' . $lineBreak;
            $message .= $lineBreak . '--' . $boundary . '--' . $lineBreak;
        }

        mail($this->destinationEmail, $this->subject, $message, $header);
    }

    /***********/
    /* SETTERS */
    /***********/

    /**
     * @param string $charset
     */
    public function setCharset($charset) {
        if (is_string($charset)) {
            $this->charset = $charset;
        } else {
            throw new \InvalidArgumentException('Le charset doit être une chaîne de caractère');
        }
    }

    /**
     * @param mixed $destinationEmail
     */
    public function setDestinationEmail($destinationEmail) {
        if (preg_match(' /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ', $destinationEmail)) {
            $this->destinationEmail = $destinationEmail;
        } else {
            throw new \InvalidArgumentException('L\'email de destination doit suivre le pattern abc@def.xyz');
        }
    }

    /**
     * @param string $htmlMsg
     */
    public function setHtmlMsg($htmlMsg) {
        if (is_string($htmlMsg)) {
            $this->htmlMsg = $htmlMsg;
        } else {
            throw new \InvalidArgumentException('');
        }
    }

    /**
     * @param int $priority
     */
    public function setPriority($priority) {
        if ($priority == self::MAX_PRIORITY || $priority == self::HIGH_PRIORITY|| $priority == self::NORMAL_PRIORITY || $priority == self::LOW_PRIORITY || $priority == self::MIN_PRIORITY) {
            $this->priority = $priority;
        } else {
            throw new \InvalidArgumentException('');
        }
    }

    /**
     * @param mixed $replyEmail
     */
    public function setReplyEmail($replyEmail) {
        if (preg_match(' /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ', $replyEmail)) {
            $this->replyEmail = $replyEmail;
        } else {
            throw new \InvalidArgumentException('L\'email de l\'envoyeur doit suivre le pattern abc@def.xyz');
        }
    }

    /**
     * @param string $replyer
     */
    public function setReplyer($replyer) {
        if (is_string($replyer)) {
            $this->replyer = $replyer;
        } else {
            throw new \InvalidArgumentException('Le nom de la personne cible du mail de la réponse doit être une chaîne de caractère.');
        }
    }

    /**
     * @param string $sender
     */
    public function setSender($sender) {
        if (is_string($sender)) {
            $this->sender = $sender;
        } else {
            throw new \InvalidArgumentException('Le nom de l\envoyeur doit être une chaîne de caractère.');
        }
    }

    /**
     * @param mixed $senderEmail
     */
    public function setSenderEmail($senderEmail) {
        if (preg_match(' /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ', $senderEmail)) {
            $this->senderEmail = $senderEmail;
        } else {
            throw new \InvalidArgumentException('L\'email de l\'envoyeur doit suivre le pattern abc@def.xyz');
        }
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject) {
        if (is_string($subject)) {
            $this->subject = $subject;
        } else {
            throw new \InvalidArgumentException('Le sujet doit être une chaîne de caractère.');
        }
    }

    /**
     * @param string $textMsg
     */
    public function setTextMsg($textMsg) {
        if (is_string($textMsg)) {
            $this->textMsg = $textMsg;
        } else {
            throw new \InvalidArgumentException('Le message doit être une chaîne de caractère.');
        }
    }

}