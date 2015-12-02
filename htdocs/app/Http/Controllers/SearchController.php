<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Es;
use Elasticsearch\Client;
define("INDEX_NAME","foodiee");
define("USER_TYPE","user");
define("POST_TYPE","post");
define("BOARD_TYPE","board");
use App\Models\User;
use App\Models\Post;
use App\Models\Board;
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createIndexMapping()
    {
//        //Bo sung them hash tag neu can
        $mappingPost = array(
            "_source"=>array(
                'enabled'=>true
                ),
            'properties'=>array(
                'post_id'=>array(
                    'type'=>'long'
                    ),
                'description'=>array(
                    'type'=>'string',
                    'analyzer'=>'nGram_analyzer',
                    ),
                )
            );
        $mappingBoard = array(
             "_source"=>array(
                'enabled'=>true
                ),
            'properties'=>array(
                'board_id'=>array(
                    'type'=>'long'
                    ),
                'title'=>array(
                    'type'=>'string',
                    'analyzer'=>'whitespace',
                    ),
                )
            );
        $mappingUser = array(
            "_source"=>array(
                'enabled'=>true
                ),
            'properties'=>array(
                'user_id'=>array(
                    'type'=>'long'
                    ),
                'username'=>array(
                    'type'=>'string',
                    'analyzer'=>'nGram_analyzer',
                    ),
                'avatar_link'=>array(
                    'type'=>'string'
                    ),
                )
            );
        $analysis = array(
            "analysis"=>array(
                "filter"=>array(
                    "nGram_filter"=>array(
                        "type"=>"edge_ngram",
                        "min_gram"=>1,
                        "max_gram"=>30,
                        "token_chars"=> [
                            "letter",
                            "digit",
                            "punctuation",
                            "symbol"
                        ]
                    )
                ),
                "analyzer"=>array(
                    "nGram_analyzer"=>array(
                        'type'=>'custom',
                        "tokenizer"=>'standard',
                        "filter"=>[
                            "lowercase",
                            "nGram_filter"
                        ],
                    )
                )
            )
        );
        $client = new Client();
        $indexParams['index'] = INDEX_NAME;
        $indexParams['body']['settings']['index']=$analysis;
        // Index Settings
        $indexParams['body']['mappings']['post'] = $mappingPost;
        $indexParams['body']['mappings']['board'] = $mappingBoard;
        $indexParams['body']['mappings']['user'] = $mappingUser;
        $result = $client->indices()->create($indexParams);
        return $result;
    }
    public function view(Request $request){
        // $client = new Elasticsearch\Client();
        $result = $this->createIndexMapping();
        return response()->json($result);
    }
    public  function search($type,$query){
        $params = [
            'index'=>INDEX_NAME,
            'type'=>$type,
            'body'=>[
                'query'=>[
                    'match'=> $query
                ]
            ]
        ];
        $client = new Client();
        $result = $client->search($params);
        return ["result"=>$result["hits"]["hits"]];
    }
    public function searchUser(Request $request){
        $name = $request->input("q");
        $query  = ["username"=>$name];
        $result = $this->search(USER_TYPE,$query);
        return $result;
    }
    public function searchBoard(Request $request){
        $name = $request->input("q");
        $query  = ["title"=>$name];
        $result = $this->search(BOARD_TYPE,$query);
        return $result;
    }
    public function searchPost(Request $request){
        $name = $request->input('q');
        $query  = ["description"=>$name];
        $result = $this->search(POST_TYPE,$query);
        return $result;
    }
    public static function insertPost($post){
        $params = [
            'index'=>INDEX_NAME,
            'type'=>POST_TYPE,
            'id'=>$post['post_id'],
            'body'=>[
                'description'=>$post["description"],
                'hashtag'=>$post["hashtag"],
            ]
        ];
        $client = new Client();
        return $client->index($params);
    }
    public function insertBoard($board){
        $params = [
            'index'=>INDEX_NAME,
            'type'=>BOARD_TYPE,
            'id'=>$board['board_id'],
            'body'=>[
                'title'=>$board["board_title"],
                'description'=>$board["description"]
            ]
        ];
        $client = new Client();
        return $client->index($params);
    }
    public function insertUser($user){
        $params = [
            'index'=>INDEX_NAME,
            'type'=>USER_TYPE,
            'id'=>$user['user_id'],
            'body'=>[
                'username'=>$user["name"],
                'avatar_link'=>$user["avatar_link"]
            ]
        ];
        $client = new Client();
        return $client->index($params);
    }
    public function insert(){

        $allUser = User::all();
        $params = ['body' => []];
        for($i=0;$i<count($allUser);$i++){
            SearchController::insertUser($allUser[$i]);
        }
        $allUser = Post::all();
        $params = ['body' => []];
        for($i=0;$i<count($allUser);$i++){
            SearchController::insertPost($allUser[$i]);
        }
        $allUser = Board::all();
        $params = ['body' => []];
        for($i=0;$i<count($allUser);$i++){
            SearchController::insertBoard($allUser[$i]);
        }
    }

    public function indexBoard($boardName){
        return 1;
    }
    public function indexPost($description){
        return 1;
    }
    public function indexUser($userName){
        return 1;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
