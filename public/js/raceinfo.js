//Vue.config.devtools = true;
var app = new Vue(
  {
    el: '#raceinfo',
    data: {
        message: '',
        current_result: [],
        status: '',
        pace_time_f: '',
        pace_time_m: '',
        codex_f: '',
        codex_m: '',
        course_name: '',
        course_length: '',
        start_length: '',
        goal_length: '',
        course_width: '',
        start_width: '',
        goal_width: '',
        course_degrees: '',
        start_degrees: '',
        goal_degrees: '',
        max_course_degrees: '',
        control_gate_width: '',
        bump_1st_degrees: '',
        bump_1st_height: '',
        bump_1st_landing_length: '',
        bump_1st_landing_degrees: '',
        bump_1st_distance: '',
        bump_1st_width: '',
        bump_2nd_degrees: '',
        bump_2nd_height: '',
        bump_2nd_landing_length: '',
        bump_2nd_landing_degrees: '',
        bump_2nd_distance: '',
        bump_2nd_width: '',
        numof_final1_f: '',
        numof_final2_f: '',
        numof_final1_m: '',
        numof_final2_m: '',
        homologation: '',
        ski_resort_name: '',
        race_title: '',
        discipline: '',
        judgenum: '',

        codex_f_en: '',
        codex_m_en: '',
        course_name_en: '',
        homologation_en: '',
        ski_resort_name_en: '',
        race_title_en: '',

        paceset_time_f: '',
        paceset_time_m: '',
        
    },
    methods: {
        getAllPaceInfo: function() {
            _self = this;
            $.ajax({
                type: 'get',
                url: "/getAllPaceInfo",
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("getAllPaceInfo OK");
                    //_self.current_result = result;
                    for( var key in result ) {
                        var val = result[key];
                        var evalstr = "_self." + val.name + "='" + val.value + "';"
                        eval(evalstr);
                        //_self.current_result.push(val.name);
                        if(val.value_en != null){
                            var evalstren = "_self." + val.name + "_en='" + val.value_en + "';"
                            eval(evalstren);
                        }
                    }
                    _self.paceset_time_f = Number(_self.course_length) / Number(_self.pace_time_f);
                    _self.paceset_time_f = _self.paceset_time_f*100;
                    _self.paceset_time_f = Math.floor(_self.paceset_time_f);
                    _self.paceset_time_f = _self.paceset_time_f/100;
                    _self.paceset_time_m = Number(_self.course_length) / Number(_self.pace_time_m);
                    _self.paceset_time_m = _self.paceset_time_m*100;
                    _self.paceset_time_m = Math.floor(_self.paceset_time_m);
                    _self.paceset_time_m = _self.paceset_time_m/100;
                    _self.$nextTick(function(){
                        //setTimeout(function(){_self.getAllPaceInfo();}, 1000);
                    });
                },
                error: function(err) {
                    console.log("getAllPaceInfo NG "+ err.responseJSON.message);
                    _self.message = "情報の取得に失敗しました。start/reloadボタンを押してください。";
                    _self.status = 'failed';
                    _self.$nextTick(function(){
                        //setTimeout(function(){_self.message = "";}, 3000);
                    });
                }
            });
        },
        //changediscipline: function(){
        //    console.log(this.discipline);
        //   
        //},
        setJudgeNum :function (judgenum){
            console.log(this.judgenum);
            this.judgenum = judgenum;
            _self = this;
            $.ajax({
                type: 'get',
                url: "/setJudgeNum",
                data: {'judgenum': this.judgenum},
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("setJudgeNum OK");
                    _self.status = 'success';
                    _self.message = "情報の設定に成功しました。";
                    _self.$nextTick(function(){
                        setTimeout(function(){_self.message = "";}, 3000);
                    });
                },
                error: function(err) {
                    console.log("setJudgeNum NG "+ err.responseJSON.message);
                    _self.message = "情報の取得に失敗しました。start/reloadボタンを押してください。";
                    _self.status = 'failed';
                    _self.$nextTick(function(){
                        setTimeout(function(){_self.message = "";}, 3000);
                    });
                }
            });
        }  
    },
    mounted() {
        _self = this;
        console.log("mounted");
        this.$nextTick(function () {
            // ビュー全体がレンダリングされた後にのみ実行されるコード
            console.log("nextTick");
            _self.getAllPaceInfo();
        })
    },
}
)
  