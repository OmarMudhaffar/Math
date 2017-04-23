<?php

ob_start();
define('API_KEY','توكن');
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text1 = $message->text;

if ($text1=="/about"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك 🍂 في بوت الاسئلة الرياضية 🔢\n البوت ليس للمتعة ☘ البوت لتقوية نفسك وربح الجوائز 🎁 الاسئلة ليست بسيطة 📖 \n يوجد هناك 50 سؤال 💰 عند الاجابة ستربح الجائزة \n عندما تربح جائزة لا يمكنك ربح اخرى 💡",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"المطورين🕴", 'callback_data'=>"sudo"]
],
[
['text'=>'الصفحة الرئيسية 📩', 'callback_data'=>'back']
]

]
])
]);
}



if($text1=="/start"){
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>'اهلا بك عزيزي ☘',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'العب 🔢', 'callback_data'=>"q1"]
        ],
        [
         ['text'=>'المطورين 🕴', 'callback_data'=>"sudo"]
        ],
        [
          ['text'=>'القناة 🔹','url'=>'https://telegram.me/touch_t']
        ],
         [
          ['text'=>'هل لديك سؤال ❔','url'=>'https://telegram.me/Math_Support_Bot']
        ],
      ]
    ])
  ]);
}


if(isset($update->callback_query)){
    $callbackMessage = '';
    var_dump(bot('answerCallbackQuery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>$callbackMessage
    ]));
    $chat_id = $update->callback_query->message->chat->id;
    $message_id = $update->callback_query->message->message_id;
    $data = $update->callback_query->data;


if($data=="no"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"عذرا لقد اخطٲت ❌",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'ابدٲ من جديد 🔄', 'callback_data'=>"q1"]
        ],
        [
        ['text'=>'الصفحة الرئيسية 📩', 'callback_data'=>"back"]
        ]
      ]
    ])
        ]);

         }


if($data=="true"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"هاذا صحيح",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q2"]
        ]
      ]
    ])
        ]);
         }

if($data=="back"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>'اهلا بك عزيزي ☘',
 'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'العب 🔢', 'callback_data'=>"q1"]
        ],
        [
         ['text'=>'المطورين 🕴', 'callback_data'=>"sudo"]
        ],
         [
          ['text'=>'القناة 🔹','url'=>'https://telegram.me/touch_t']
        ],
        [
          ['text'=>'هل لديك سؤال ❔','url'=>'https://telegram.me/Math_Support_Bot']
        ]
      ]
    ])
  ]);
}

    
if($data=="sudo"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"مطورين البوت 🕴",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'Omar Real', 'url'=>"https://telegram.me/omar_real"]
        ],
        [
        ['text'=>'Murtaza', 'url'=>"https://telegram.me/CSS_TR"]
        ],
        [
          ['text'=>'هل لديك سؤال ❔','url'=>'https://telegram.me/Math_Support_Bot']
        ],
        [
        ['text'=>'الصفحة الرئيسية 📩️', 'callback_data'=>"back"]
        ]
      ]
    ])
        ]);
         }         
         






    if($data=="true2"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"انت بارع",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q3"]
        ]
      ]
    ])
        ]);
         }
         
    if($data=="q2"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"9 - 6 = ",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"2",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"5", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"3", 'callback_data'=>"true2"]
                    ]
                ]
            ])
]);
         }
         
         
       
if($data=="true3"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"هاذه يبدو جميلا",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q4"]
        ]
      ]
    ])
        ]);
         }
         
         
if($data=="q3"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"32 - 8 + 5 = ",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"29",'callback_data'=>"true3"]
                        ],
                       [ 
                    ['text'=>"27", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"31", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         



if($data=="true4"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"انت تبلي حسنا",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q5"]
        ]
      ]
    ])
        ]);
         }


    if($data=="q4"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"6 x 8 + 3 = ",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"62",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"51", 'callback_data'=>"true4"]
                    ],
                    [
                    ['text'=>"56", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"49", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
    

if($data=="true5"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"هاذا ممتع",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q6"]
        ]
      ]
    ])
        ]);
         }


   if($data=="q5"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"46 ÷ 2 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"28",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"22", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"23", 'callback_data'=>"true5"]
                    ],
                    [
                    ['text'=>"24", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         
         
         
         
if($data=="true6"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"سنتاول اليوم الرياضيات على العشاء",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q7"]
        ]
      ]
    ])
        ]);
         }
         
    if($data=="q6"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"5 x 6 ÷ 2 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"16",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"18", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"10", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"15", 'callback_data'=>"true6"]
                    ]
                ]
            ])
]);
         }
         
         
         
    if($data=="true7"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"كم انت رائع",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q8"]
        ]
      ]
    ])
        ]);
         }
         
         
    if($data=="q7"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"6 + 8 × 2 ÷ 4 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"10",'callback_data'=>"true7"]
                        ],
                       [ 
                    ['text'=>"8", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"9", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"11", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         


if($data=="true8"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"هاذا يبدو شهيا",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q9"]
        ]
      ]
    ])
        ]);
         }
         
         
if($data=="q8"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"20 × 2 + 8 × 1 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"46",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"48", 'callback_data'=>"true8"]
                    ],
                    [
                    ['text'=>"49", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"42", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }


if($data=="true9"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"ممتاز",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q10"]
        ]
      ]
    ])
        ]);
         }


if($data=="q9"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"122  x  2  -  46 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"197",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"196", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"198", 'callback_data'=>"true9"]
                    ],
                    [
                    ['text'=>"192", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }         
  
  
 if($data=="true10"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"احسنت صنعا",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q11"]
        ]
      ]
    ])
        ]);
         }
         
if($data=="q10"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"122 x 2 - 160 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"88",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"89", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"84", 'callback_data'=>"true10"]
                    ],
                    [
                    ['text'=>"86", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         

if($data=="true11"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"ماكل هاذا التفوق",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q12"]
        ]
      ]
    ])
        ]);
         }
         
         
if($data=="q11"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"50 x 4 - 6 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"194",'callback_data'=>"true11"]
                        ],
                       [ 
                    ['text'=>"197", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"192", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"196", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
     
     
     
if($data=="true12"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"متع عقلك مع الرياضيات",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q13"]
        ]
      ]
    ])
        ]);
         }         

if($data=="q12"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"12 x 6 ÷ 4 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"15",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"16", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"14", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"18", 'callback_data'=>"true12"]
                    ]
                ]
            ])
]);
         }
       

if($data=="true13"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"انت عبقري",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q14"]
        ]
      ]
    ])
        ]);
         }         
         
if($data=="q13"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"6 - 6 + 6 ÷ 2 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"2",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"6", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"3", 'callback_data'=>"true13"]
                    ],
                    [
                    ['text'=>"0", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }



if($data=="true14"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"تم ترقيتك للقب الزعيم",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q15"]
        ]
      ]
    ])
        ]);
         }
         
         
if($data=="q14"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"9 x 7 + 40 ÷ 2 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"71.6",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"86", 'callback_data'=>"71.4"]
                    ],
                    [
                    ['text'=>"71.3", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"71.5", 'callback_data'=>"true14"]
                    ]
                ]
            ])
]);
         }
         

if($data=="true15"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"ما كل هاذه البراعة",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q16"]
        ]
      ]
    ])
        ]);
         }
         
         
if($data=="q15"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"107 + 80 ÷ 8 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"119",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"117", 'callback_data'=>"true15"]
                    ],
                    [
                    ['text'=>"118", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"115", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
 
 if($data=="true16"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"اصبحت في مستوى متقدم",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q17"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q16"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"99 ÷ 2 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"49.5",'callback_data'=>"true16"]
                        ],
                       [ 
                    ['text'=>"47.6", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"48.3", 'callback_data'=>"none"]
                    ],
                    [
                    ['text'=>"46.8", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }


if($data=="true17"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"انت بارع جدا",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q18"]
        ]
      ]
    ])
        ]);
         }

if($data=="q17"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"80 x 4 - 5 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"317",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"320", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"315", 'callback_data'=>"true17"]
                    ],
                    [
                    ['text'=>"316", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
    
    
if($data=="true18"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"كم انت رائع",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q19"]
        ]
      ]
    ])
        ]);
         }
        
if($data=="q18"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"64 x 4 - 50 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"208",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"207", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"206", 'callback_data'=>"true18"]
                    ],
                    [
                    ['text'=>"202", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         
         
          if($data=="true19"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"ما رٲيك لو نصعب الامر قليلا ؟",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q20"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q19"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"60 x 7 ÷ 4 = ",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"105",'callback_data'=>"true19"]
                        ],
                       [ 
                    ['text'=>"108", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"103", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"106", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         
if($data=="true20"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"تم ترقيتك لمستوى الزعيم",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q21"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q20"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"38 × 6 ÷ 5  =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"45.2", 'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"45.7", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"45.3", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"45.6", 'callback_data'=>"true20"]
                    ]
                ]
            ])
]);
         }
         
         
    if($data=="true21"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"اليس هاذا رائعا ؟ ",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q22"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q21"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"7 + 6 × 3 ÷ 3 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"14", 'callback_data'=>"no"]
                        ],
                       [
                    ['text'=>"11", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"15", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"13", 'callback_data'=>"true21"]
                    ]
                ]
            ])
]);
         }     
         
         
   if($data=="true22"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"لا يمكنك التوقف الان",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q23"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q22"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"36 - 7 + 96 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"126", 'callback_data'=>"no"]
                        ],
                       [
                    ['text'=>"123", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"125", 'callback_data'=>"true22"]
                    ],
                    [
                    ['text'=>"120", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }     
         
         
         
         
  if($data=="true23"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"هل تشعر بهاذه الطاقة ؟",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q24"]
        ]
      ]
    ])
        ]);
         }       
         
        if($data=="q23"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"83 × 4 + 60 ÷ 2 = ",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"356", 'callback_data'=>"no"]
                        ],
                       [
                    ['text'=>"362", 'callback_data'=>"true23"]
                    ],
                    [
                    ['text'=>"167", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"159", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }       
         
         
         
       if($data=="true24"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"انت الافضل",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q25"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q24"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"83 × 4 + 231 × 4 ÷ 2 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"796",'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"794", 'callback_data'=>"true24"]
                    ],
                    [
                    ['text'=>"798", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=> "793", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
     
     
   if($data=="true25"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"جيد جدا انت مذهل",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q26"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q25"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"25 × 36 + 69 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"969",'callback_data'=>"true25"]
                        ],
                       [ 
                    ['text'=>"780", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"650", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"890", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         
         
         
         if($data=="true26"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"مع هاذا التقدم ستفوز قريبا",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q27"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q26"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"8 × 22 - 8 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"161",
'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"168", 'callback_data'=>"true26"]
                    ],
                    [
                    ['text'=>"167", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"162", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         
         if($data=="true27"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"لقد اذهلتني حقا",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q28"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q27"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"25 + 82 - 36 - 14 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"50",
'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"59", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"52", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"57", 'callback_data'=>"true27"]
                    ]
                ]
            ])
]);
         }
         
         
         
         if($data=="true28"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"احسنت لقد برعت الرياضيات",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q29"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q28"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"71 + 92 × 6 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"667",
'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"626", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"623", 'callback_data'=>"true28"]
                    ],
                    [
                    ['text'=>"651", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         
         if($data=="true29"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"تابع على هاذا المستوى",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q30"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q29"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"18 ÷ 2 × 5 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"55",
'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"52", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"45", 'callback_data'=>"true29"]
                    ],
                    [
                    ['text'=>"42", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         
         
         if($data=="true30"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"دعنا نصعب الامر قليلا",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q31"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q30"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"96 ÷ 4 - 2 + 89 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"116",
'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"111", 'callback_data'=>"true30"]
                    ],
                    [
                    ['text'=>"119", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"120", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         
         
         if($data=="true31"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"يبدو انك ذكي ولا تستعمل المساعدات",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q32"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q31"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"66 ÷ 99 + 2 × 6 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"12.66",
'callback_data'=>"true31"]
                        ],
                       [ 
                    ['text'=>"12.48", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"12.84", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"13.56", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         
         
         if($data=="true32"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"احسنت صنعا لا تتوقف الان",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q33"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q32"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"9 ÷ 3 + 32 × 6 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"191",
'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"193", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"197", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"195", 'callback_data'=>"true32"]
                    ]
                ]
            ])
]);
         }
         
         
          if($data=="true33"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"اليس هاذا رائعا",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q34"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q33"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"30 ÷ 5 + 36 × 5 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"188",
'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"186", 'callback_data'=>"true33"]
                    ],
                    [
                    ['text'=>"177", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"180", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         if($data=="true34"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"استمر علة هاذ المنوال",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q35"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q34"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"90 ÷ 5 + 36 - 21 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"36",
'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"38", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"31", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"33", 'callback_data'=>"true34"]
                    ]
                ]
            ])
]);
         }
         
         if($data=="true35"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"لم يتبقى شيى كدت ان تفوز",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q36"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q35"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"50 - 25 + 36 × 90 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"3265",
'callback_data'=>"true35"]
                        ],
                       [ 
                    ['text'=>"3266", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"3432", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"3370", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
if($data=="q1"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
   'message_id'=>$message_id,
   'text'=>"1 + 1 = ",
                  'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [
                        ['text'=>"2",'callback_data'=>"true"]
                        ],
                       [ 
                    ['text'=>"3", 'callback_data'=>"no"]
                    ],
                ]
            ])
]);
         }
         


         if($data=="true36"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"تم ✅ ترقيتك للقب الماستر ✨",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q37"]
        ]
      ]
    ])
        ]);
         }
         
if($data=="q36"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"300 × 4 ÷ 8 + 54 =",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"206",
'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"202", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"204", 'callback_data'=>"true36"]
                    ],
                    [
                    ['text'=>"203", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         
if($data=="true37"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"كم هاذا رائع ايها الماستر ✨🚹",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q38"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q37"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"18 × 7 ÷ 6 + 54 - 30 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"47",
'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"42", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"44", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"45", 'callback_data'=>"true37"]
                    ]
                ]
            ])
]);
         }
         
         
         
if($data=="true38"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"هل تعلم❔ان اللبرت اينشتاين اكبر عالم رياضيات 🔢",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q39"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q38"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"36 × 7 ÷ 14 + 31 - 30 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"19",
'callback_data'=>"start38"]
                        ],
                       [ 
                    ['text'=>"17", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"20", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"18", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         
         
if($data=="true39"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"لقد كدت ان تصل ✨ الى النهاية 🚹",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'اكمل', 'callback_data'=>"q40"]
        ]
      ]
    ])
        ]);
         }
         
     if($data=="q39"){
   bot('editMessageText',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"22 ÷ 4 × 43 - 76 =",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
                        ['text'=>"160.7",
'callback_data'=>"no"]
                        ],
                       [ 
                    ['text'=>"160.9", 'callback_data'=>"no"]
                    ],
                    [
                    ['text'=>"160.5", 'callback_data'=>"true39"]
                    ],
                    [
                    ['text'=>"160.2", 'callback_data'=>"no"]
                    ]
                ]
            ])
]);
         }
         
         
         
}

if($text1=="/play"){
bot('sendmessage', [
'text'=>"بل توفيق 😃💡 @".$message->from->username,
'chat_id'=>$chat_id
]);
}

if($text1=="/play"){
   bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"1 + 1 = ",
                  'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [
                        ['text'=>"2",'callback_data'=>"true"]
                        ],
                       [ 
                    ['text'=>"3", 'callback_data'=>"no"]
                    ],
                ]
            ])
]);
         }

  ?>