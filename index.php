<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" media="all" href="css/terminal-1.0.2.min.css">
    <style>

            body{
                margin: 0px;
                padding: 0px;
                position: relative;
            }   

            body #wrapper{
                width: 100%;
                height: 100%;
                position: fixed;
                /*margin-left:10%;*/
            }   

            *:focus{
                outline:none;
            }   

    </style>
    <title>.board</title>
</head>
<body>
  <!-- <h1>arbor.js</h1> --> 
    <div id="wrapper">
        <canvas id="viewport"></canvas>
    </div>

    <!--<div style="width:100%;height:50px;position:fixed;top:0;padding:10px;">
        <a href="./mypage.php" style="text-decoration:none;color:#cccccc;margin:0;font-size:16px;">＜ーリストへもどる</a>
        <span id="btitle" style="margin-left:300px;color:gray;font-size:20px;"></span>
    </div>-->

    <!-- コマンドターミナル -->
    <!--<div style="height:150px;width:100%;position:fixed;bottom:0;overflow-y:scroll;display:none;" id="cui_box">
        <div id="terminal"></div>
    </div>-->

    <div style="width:20%;position:fixed;bottom:0;left:0;height:100%;background-color:rgba(50,50,50,0.5);text-align:center;padding-top:20px;">
        <div style="width:100%;text-align:left;">
            <h4 style="color:white;padding-left:10px;">ノード追加</h4>
            <input id="keyword" type="text" value="" placeholder="keyword..." style="width: 80%;font-size:20px;margin-left:10%;">
            <button type="button" onclick="addNode();">ノード追加</button>
        </div>
        <div style="width:100%;text-align:left;">
            <h4 style="color:white;padding-left:10px;">コネクション追加</h4>
            <form onsubmit="addEdge(); return false;" style="width:100%;">
                <ul style="list-style:none;padding:0px;">
                    <li style="padding:10px;">
                        <input id="word1" type="text" value="" placeholder="word1..." style="width: 80%;font-size:20px;margin-left:10%;">
                    </li>
                    <li style="padding:10px;">
                        <input id="word2" type="text" value="" placeholder="word2..." style="width: 80%;font-size:20px;margin-left:10%;">
                    </li>
                    <li style="padding:10px;"><button type="submit" style="display:none;"></li>
                </ul>
            </form>
        </div>
        <div style="width:100%;text-align:left;">
            <h4 style="color:white;padding-left:10px;">ノード削除</h4>
            <form onsubmit="deleteNode(); return false;" style="width:100%;">
                <input id="delete_word" type="text" value="" placeholder="word1..." style="width: 80%;font-size:20px;margin-left:10%;">
                <button type="submit" style="display:none;">
            </form>
        </div>
        <div style="width:100%;text-align:left;">
            <h4 style="color:white;padding-left:10px;">コネクションのみ削除</h4>
            <form onsubmit="deleteEdge(); return false;" style="width:100%;">
                <input id="delete_node" type="text" value="" placeholder="word1..." style="width: 80%;font-size:20px;margin-left:10%;">
                <button type="submit" style="display:none;">
            </form>
        </div>
    </div>
</body>
<script src="js/jquery-1.6.1.min.js"></script>
<script src="js/jquery.address-1.4.min.js"></script>
<script src="js/arbor.js"></script>
<script src="js/arbor-tween.js"></script>
<script src="js/graphics.js"></script>
<script src="js/sample.js"></script>
<script>
    var user_id = "pianopia";
    var board_id = getParam("bname");

    $(function () {
        sizing();
        $(window).resize(function() {
            sizing();
        });
    });

    // ボードのウィンドウサイズにFit
    function sizing(){
        $("#viewport").attr({height:$("#wrapper").height()});
        //$("#viewport").attr({width:($("#wrapper").width()/10)*8});
        $("#viewport").attr({width:$("#wrapper").width()});

        $("#btitle").text(board_id);

        // デバッグ
        //alert(board_id);
    }


    // ユーザーのNodeを取得
    function fetchNodes(db) {
        //var key = "user_0001";
        //db.collection("nodes").where("bid", "==", board_id).get().then((querySnapshot) => {
            //querySnapshot.forEach((doc) => {
                sys.addNode(doc.data().node, {who:"sokusitsu"});
            //});
        //});
    }

    // ユーザーのEdgeを取得
    function fetchEdges(db) {
    //            var word1 = doc.data().edge_from;
    //            var word2 = doc.data().edge_to;
    //            if(word1 != null && word2 != null && word1 != "" && word2 != "") {
    //                sys.addEdge(word1, word2);
    //            }
    }

    // Nodeを登録
    function insertNode(db, word) {
    }

    $(document).ready(() => {
        sys.addNode("test", {id: 1});
        sys.addNode("test2", {id: 2, type: "big"});
        sys.addNode("test3", {id: 3});
        sys.addNode("test4", {id: 4});

        sys.addNode("test5", {id: 5, type: "small"});

        sys.addNode("・・・", {id: 6, type: "small"});

        sys.addNode("・・・", {id: 7, type: "small"});


        sys.addEdge("test", "test2");
        sys.addEdge("test2", "test3");
        sys.addEdge("test2", "test4");
        sys.addEdge("test4", "test5");
        sys.addEdge("test4", "test5");
    });


    // 線を登録
    function insertEdge(db, from, to) {
            //edge_from: from,
            //edge_to: to,
            //created_at: "2019/4/24 11:00:00 PM",
            //updated_at: "2019/4/24 11:00:00 PM",
            //bid: board_id,
    }

    function addNode() {
        var keyword = $("#keyword").val();
        sys.addNode(keyword, {who: "sokusitsu"});
        $("#keyword").val(null);
        //insertNode(keyword);
    }

    function addEdge() {
        var word1 = $("#word1").val();
        var word2 = $("#word2").val();
        sys.addEdge(word1, word2);
        $("#word1").val(null);
        $("#word2").val(null);
        insertEdge(db, word1, word2);
    }

    // ボードを削除
    function deleteNode() {
        var node = $("#delete_word").val();
        var docs = db.collection("nodes").where("node", "==", node);
        docs.get().then(function(querySnapshot) {
            querySnapshot.forEach(function(doc) {
                doc.ref.delete().then(function(docRef) {})
                .catch(function(error) { console.error("Error adding document: ", error); })
            });
        });

        var docs3 = db.collection("edges").where("edge_to", "==", node);
        docs3.get().then(function(querySnapshot) {
            querySnapshot.forEach(function(doc) {
                doc.ref.delete().then(function(docRef) {})
                .catch(function(error) { console.error("Error adding document: ", error); })
            });
        });

        setTimeout("location.reload()", 3000);
    }

    function deleteEdge() {
        var node = $("#delete_node").val();
    }

    // GETパラメータ取得
    function getParam(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
    
</script>

<script src="js/terminal-1.0.2.min.js"></script>
<script>
/*
    var is_cui_box = false;
    var terminal = new Terminal('terminal', {}, {
        execute: function(cmd, args) {
            switch (cmd) {
                case 'clear':
                    terminal.clear();
                    return '';

                case 'help':
                    return 'Commands: clear, help, theme, ver or version<br>More help available <a class="external" href="http://github.com/SDA/terminal" target="_blank">here</a>';

                case 'theme':
                    if (args && args[0]) {
                        if (args.length > 1) return 'Too many arguments';
                        else if (args[0].match(/^interlaced|modern|white$/)) { terminal.setTheme(args[0]); return ''; }
                        else return 'Invalid theme';
                    }
                    return terminal.getTheme();
                case 'node':
                    switch (args[0]) {
                        case 'add':
                            if(args[1] == "" || args[1] == undefined) {
                                return 'no target arguments'
                            }
                            sys.addNode(arg[1], {who: "sokusitsu"});
                            return '';
                        case 'delete':
                            if(args[1] == "" || args[1] == undefined) {
                                return 'no target arguments';
                            }
                            return '';
                    }                    
                case 'ver':
                case 'version':
                    return '1.0.0';

                default:
                    // Unknown command.
                    return false;
            };
        }
    });

*/
</script>
</html>
