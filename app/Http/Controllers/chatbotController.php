<?php

namespace App\Http\Controllers;

use App\Models\BotLog;
use App\Models\UserLog;
use Exception;
use Illuminate\Container\RewindableGenerator;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Orhanerday\OpenAi\OpenAi;

class chatbotController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function __construct()
    {
        $this->users = new User();
        $this->user_chat = new UserLog();
        $this->bot_chat = new BotLog();
    }

    public function index(Request $req){
        $data['user'] = $this->users->where('username', $req->session()->get('username'))->first();
        $data['user_chat'] = $this->user_chat->all();
        // $data['bot_chat'] = $this->bot_chat->all();
        // dd($data);
        return view('menus.chatbot', compact('data'));
    }

    public function bot_sent(Request $req){
        $open_ai_key = ('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');
        $open_ai = new OpenAi($open_ai_key);

        $get_user_log = $this->user_chat->where(['id_chatbot_log' => 0])->orderByDesc('id')->first();
        // dd($get_user_log);
        $complete = $open_ai->completion([
            'model' => 'davinci',
            'prompt' => $get_user_log->sent_message,
            'temperature' => 0.9,
            'max_tokens' => 150,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
        ]);
        $complete = json_decode($complete);
        $complete = [
            'id_chatbot_log' => 1,
            'sent_at' => date('Y-m-d H:i:s'),
            'sent_message' => $complete->choices[0]->text,
        ];
        if(UserLog::create($complete)){
            return response()->json($complete);
        }
    }

    public function user_sent(Request $req){
        $data = [
            'id_chatbot_log' => 0,
            'sent_message' => $req->input_field,
            'sent_at' => date('Y-m-d H:i:s'),
        ];
        try{
            if (UserLog::create($data)){
                return redirect()->back();
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function clear_log(Request $req){
        UserLog::truncate();
        return redirect()->back();
    }
}
