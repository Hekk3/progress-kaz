<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 23.01.2020
 * Time: 17:02
 */

namespace App\Mail;


use App\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class Feedback extends Mailable
{

    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Request
     */
    public $model;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $model)
    {
        $this->model = $model;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.feedback')->subject("Пользователь хочет связаться с вами");
    }
}
