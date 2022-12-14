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
use SebastianBergmann\Complexity\Complexity;

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
        $this->open_ai = $this->init_bot();
    }

    public function index(Request $req){
        // UserLog::truncate();
        $data['user'] = $this->users->where('username', $req->session()->get('username'))->first();
        $data['user_chat'] = $this->user_chat->all();
        // $data['bot_chat'] = $this->bot_chat->all();
        // dd($data);
        return view('menus.chatbot', compact('data'));
    }

    public function init_bot(){
        $open_ai_key = env('SECRET_KEY_GPT');
        $open_ai = new OpenAi($open_ai_key);
        return $open_ai;
    }

    public function bot_sent(Request $req){
        $open_ai = $this->init_bot();
        $get_log = $this->user_chat->all();
        $get_user_log = $this->user_chat->where(['id_chatbot_log' => 0, 'answered' => 0])->orderByDesc('id')->first();
        $query = "The following is a conversation with an AI assistant. The assistant is helpful, creative, clever, and very friendly. Human: ";
        $prompt = $query.'';
        foreach ($get_log as $l){
            $prompt.= $l->sent_message;
        }
        $prompt.= '\nHuman: ';
        
        $complete = $open_ai->completion([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'temperature' => 0.9,
            'max_tokens' => 150,
            "top_p" => 1,
            "frequency_penalty" => 0.0,
            "presence_penalty" => 0.6,
            "stop" => ['Human:','AI:'],
        ]);
        $complete = json_decode($complete);
        $text = str_replace('AI Assistant', '', $complete->choices[0]->text);
        $text = str_replace('AI assistant ', '', $text);
        $text = str_replace('assistant', '', $text);
        $text = str_replace('Assistant', '', $text);
        $text = str_replace(':', '', $text);
        
        $complete = [
            'id_chatbot_log' => 1,
            'sent_at' => date('Y-m-d H:i:s'),
            'prompt' => $get_user_log->sent_message,
            'sent_message' => $text,
        ];
        if(UserLog::create($complete)){
            UserLog::where('id', $get_user_log->id)->update(['answered' => 0]);
            return response()->json($complete);
        }
    }

    public function user_sent(Request $req){
        $data = [
            'id_chatbot_log' => 0,
            'sent_message' => $req->s,
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
