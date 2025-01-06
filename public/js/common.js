//Vue.config.devtools = true;
var appcommon = new Vue(
  {
    el: '#common',
    data: {
        message: '',
        current_result: [],
        status: '',
        classname: '',
        sex: '',
        season: '',
        codex: '',
        sajno: '',
        start: '',
        bib: '',
        name: '',
        pref: '',
        team: '',
        time_paceset: '',
    },
    methods: {
        getCurrentRacer: function() {
            _cmnself = this;
            $.ajax({
                type: 'get',
                url: "/currentresult/getcurrentracer",
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("getCurrentRacer OK");
                    _cmnself.current_result = result;
                    _cmnself.setCurrentRacer(result);
                    /*
                    _cmnself.classname = _cmnself.current_result[0].class;
                    _cmnself.sex = _cmnself.current_result[0].sex;
                    _cmnself.season = _cmnself.current_result[0].season;
                    _cmnself.codex = _cmnself.current_result[0].codex;
                    _cmnself.start = _cmnself.current_result[0].start;
                    _cmnself.sajno = _cmnself.current_result[0].sajno;
                    _cmnself.bib = _cmnself.current_result[0].bib;
                    _cmnself.name = _cmnself.current_result[0].name;
                    _cmnself.pref = _cmnself.current_result[0].pref;
                    _cmnself.team = _cmnself.current_result[0].team;
                    */
                    _cmnself.$nextTick(function(){
                        setTimeout(function(){_cmnself.getCurrentRacer();}, 1000);
                    });
                },
                error: function(err) {
                    console.log("getCurrentRacer NG "+ err.message);
                    _cmnself.message = "情報の取得に失敗しました。start/reloadボタンを押してください。";
                    _cmnself.status = 'failed';
                    _cmnself.$nextTick(function(){
                        //setTimeout(function(){_cmnself.message = "";}, 3000);
                    });
                }
            });
        },
        setCurrentRacer: function(result){
            _cmnself = this;
            _cmnself.classname = result.class;
            _cmnself.sex = result.sex;
            _cmnself.season = result.season;
            _cmnself.codex = result.codex;
            _cmnself.start = result.start;
            _cmnself.sajno = result.sajno;
            _cmnself.bib = result.bib;
            _cmnself.name = result.name;
            _cmnself.pref = result.pref;
            _cmnself.team = result.team;

        },
        getCurrentPacetime: function() {
            _cmnself = this;
            $.ajax({
                type: 'get',
                url: "/currentresult/getPacetime",
                data: {},
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("getCurrentPacetime OK");
                    _cmnself.time_paceset = result;
                    _cmnself.$nextTick(function(){
                    //    setTimeout(function(){_cmnself.getCurrentPacetime();}, 1000);
                    });
                },
                error: function(err) {
                    console.log("getCurrentPacetime NG "+ err.responseJSON.message);
                    _cmnself.message = "情報の取得に失敗しました。";
                    _cmnself.status = 'failed';
                    _cmnself.$nextTick(function(){
                        //setTimeout(function(){_cmnself.message = "";}, 3000);
                    });
                }
            });
        },
        onClickPrev: function() {
            console.log("onClickPrev");
            _cmnself = this;
            $.ajax({
                type: 'get',
                url: "/currentresult/getPrevRacer",
                data: {},
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("onClickPrev OK");
                    _cmnself.current_result = result;
                    _cmnself.setCurrentRacer(result);
                },
                error: function(err) {
                    console.log("onClickPrev NG "+ err.responseJSON.message);
                    _cmnself.message = "情報の取得に失敗しました。start/reloadボタンを押してください。";
                    _cmnself.status = 'failed';
                    _cmnself.$nextTick(function(){
                        //setTimeout(function(){_cmnself.message = "";}, 3000);
                    });
                }
            });
        },
        onClickNext: function() {
            console.log("onClickNext");
            _cmnself = this;
            $.ajax({
                type: 'get',
                url: "/currentresult/getNextRacer",
                data: {},
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("onClickNext OK");
                    _cmnself.current_result = result;
                    _cmnself.setCurrentRacer(result);
                },
                error: function(err) {
                    console.log("onClickNext NG "+ err.responseJSON.message);
                    _cmnself.message = "情報の取得に失敗しました。start/reloadボタンを押してください。";
                    _cmnself.status = 'failed';
                    _cmnself.$nextTick(function(){
                        //setTimeout(function(){_cmnself.message = "";}, 3000);
                    });
                }
            });
        },
        onClickSetCurrent: function() {
            console.log("onClickSetCurrent");
            _cmnself = this;
            $.ajax({
                type: 'post',
                url: "/currentresult/testinsert",
                data: {},
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("onClickSetCurrent OK");
                    _cmnself.current_result = result;
                    _cmnself.setCurrentRacer(result);
                },
                error: function(err) {
                    console.log("onClickSetCurrent NG "+ err.message);
                    _cmnself.message = "情報の取得に失敗しました。start/reloadボタンを押してください。";
                    _cmnself.status = 'failed';
                    _cmnself.$nextTick(function(){
                        //setTimeout(function(){_cmnself.message = "";}, 3000);
                    });
                }
            });
        },
    },
    mounted() {
        _cmnself = this;
        console.log("mounted");
        this.$nextTick(function () {
            // ビュー全体がレンダリングされた後にのみ実行されるコード
            console.log("nextTick");
            //_cmnself.getCurrentRacer();
        })
    },
}
)
  