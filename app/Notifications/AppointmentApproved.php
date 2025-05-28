<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AppointmentApproved extends Notification
{
    protected $doctor;
    protected $appointment;

    public function __construct($doctor, $appointment)
    {
        $this->doctor = $doctor;
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // optional: add 'broadcast' for real-time
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Appointment is Confirmed')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Your appointment has been approved by Dr. ' . $this->doctor->name . ' (' . $this->doctor->speciality . ').')
            ->line('Date: ' . $this->appointment->appointment_date)
            ->line('Time: ' . $this->appointment->appointment_time)
            ->action('View Appointment', url('/appointments'))
            ->line('Thank you for using our service!');
    }

   public function toArray($notifiable)
{
    return [
        'doctor_name' => $this->doctor->name,
        'doctor_speciality' => $this->doctor->speciality,
        'doctor_image' => $this->doctor->profile_picture ?? null, // update based on your DB
        'appointment_id' => $this->appointment->id,
        'appointment_date' => $this->appointment->appointment_date,
        'appointment_time' => $this->appointment->appointment_time,
        'message' => 'Your appointment with Dr. ' . $this->doctor->name . ' has been confirmed.',
    ];
}

}

