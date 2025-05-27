<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewBlogPosted extends Notification
{
    use Queueable;

    protected $blog;

    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    public function via($notifiable)
    {
        return ['database']; // you can also add 'mail', 'broadcast', etc.
    }

   public function toDatabase($notifiable)
{
    return [
        'doctor_name' => $this->blog->name,
        'profile_picture' => $this->blog->profile_picture, // assuming it's stored like 'profiles/image.jpg'
        'blog_title' => $this->blog->title,
        'blog_id' => $this->blog->id,
        'created_at' => now()->toDateTimeString()
    ];
}

}

