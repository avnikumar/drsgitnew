<?php
namespace App\Controllers\Chat;

use CodeIgniter\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat/chat');
    }
}
