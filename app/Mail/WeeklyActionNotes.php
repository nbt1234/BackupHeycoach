<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WeeklyActionNotesExport;

class WeeklyActionNotes extends Mailable
{
    use Queueable, SerializesModels;
    public $formdata;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formdata)
    {
        //
        $this->formdata = $formdata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {        
        return $this->markdown('emails.weekly_action_notes')->with('body', $this->formdata)
            ->attach(
                Excel::download(
                    new WeeklyActionNotesExport($this->formdata), 
                    'action-notes-report.xlsx'
                )->getFile(), ['as' => 'action-notes-report.xlsx']
            );
    }
}
