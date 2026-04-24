<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeaveStatusUpdated;
use App\Models\LeaveRequest;

class TestMail extends Command
{
    protected $signature = 'mail:test';
    protected $description = 'Test mail configuration';

    public function handle()
    {
        $this->info('Testing Mail Configuration...');
        $this->line('');

        $this->info('1. Mail Driver: ' . config('mail.default'));
        $this->info('2. Mail Host: ' . config('mail.mailers.smtp.host'));
        $this->info('3. Mail Port: ' . config('mail.mailers.smtp.port'));
        $this->info('4. From Address: ' . config('mail.from.address'));
        $this->info('5. From Name: ' . config('mail.from.name'));
        $this->line('');

        $this->info('6. Sending test email...');
        try {
            Mail::raw('This is a test email from LeaveFlow.', function ($message) {
                $message->to('test@example.com')
                        ->subject('LeaveFlow Test Email');
            });
            $this->info('   ✓ Test email sent successfully!');
        } catch (\Exception $e) {
            $this->error('   ✗ Error: ' . $e->getMessage());
        }

        $this->line('');
        $this->info('7. Testing LeaveStatusUpdated Mailable...');
        try {
            $leave = LeaveRequest::first();
            if ($leave) {
                $mailable = new LeaveStatusUpdated($leave);
                $this->info('   ✓ Mailable created successfully!');
                $this->info('   - Subject: ' . $mailable->envelope()->subject);
            } else {
                $this->warn('   ⚠ No leave request found to test mailable');
            }
        } catch (\Exception $e) {
            $this->error('   ✗ Error: ' . $e->getMessage());
        }

        $this->line('');
        $this->info('✓ Mail configuration test complete!');
    }
}