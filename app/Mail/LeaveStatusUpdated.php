<?php

namespace App\Mail;

use App\Models\LeaveRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeaveStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public LeaveRequest $leave;

    /**
     * Create a new message instance.
     */
    public function __construct(LeaveRequest $leave)
    {
        $this->leave = $leave;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Leave Request Has Been ' . ucfirst($this->leave->status),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.leave-status',
            with: [
                'leave' => $this->leave,
                'statusColor' => match ($this->leave->status) {
                    'approved' => '#10b981',
                    'rejected' => '#ef4444',
                    default => '#f59e0b',
                },
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

