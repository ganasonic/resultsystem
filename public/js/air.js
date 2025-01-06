//Vue.config.devtools = true;
var app = new Vue(
  {
    el: '#air',
    data: {
        message: '',
        air_point1: 10.0,
        air_point2: 10.0,
        current_max1: 10.0,
        current_max2: 10.0,
        air_code1: '',
        air_code2: '',
        air_dd1: 0.0,
        air_dd2: 0.0,
        sex: 'F',
        selectedAirCode1: '-',
        selectedAirCode2: '-',
        isGrab1: false,
        isGrab2: false,
        level1: 'Level',
        level2: 'Level',
        aircodecategories1: [],      
        aircodecategories2: [],
        /*将来的にDBから取得する*/
        aircode_up: [
            {code:'-',ddm:0.000 ,ddf:0.000 },
            {code:'D',ddm:0.410 ,ddf:0.510 },
            {code:'DD',ddm:0.560 ,ddf:0.660 },
            {code:'DDD',ddm:0.700 ,ddf:0.800 },
            {code:'DDDG',ddm:0.830 ,ddf:0.930 },
            {code:'DDG',ddm:0.690 ,ddf:0.790 },
            {code:'DDS',ddm:0.670 ,ddf:0.770 },
            {code:'DDT',ddm:0.670 ,ddf:0.770 },
            {code:'DDTS',ddm:0.750 ,ddf:0.850 },
            {code:'DDTT',ddm:0.750 ,ddf:0.850 },
            {code:'DDTTS',ddm:0.790 ,ddf:0.890 },
            {code:'DG',ddm:0.540 ,ddf:0.640 },
            {code:'DK',ddm:0.560 ,ddf:0.660 },
            {code:'DKG',ddm:0.690 ,ddf:0.790 },
            {code:'DLD',ddm:0.890 ,ddf:0.990 },
            {code:'DS',ddm:0.530 ,ddf:0.630 },
            {code:'DSG',ddm:0.660 ,ddf:0.760 },
            {code:'DT',ddm:0.530 ,ddf:0.630 },
            {code:'DTG',ddm:0.660 ,ddf:0.760 },
            {code:'DTS',ddm:0.640 ,ddf:0.740 },
            {code:'DTSG',ddm:0.770 ,ddf:0.870 },
            {code:'DTT',ddm:0.640 ,ddf:0.740 },
            {code:'DTTG',ddm:0.770 ,ddf:0.870 },
            {code:'DTTS',ddm:0.720 ,ddf:0.820 },
            {code:'DTTSG',ddm:0.850 ,ddf:0.950 },
            {code:'DXS',ddm:0.670 ,ddf:0.770 },
            {code:'DXSG',ddm:0.800 ,ddf:0.900 },
            {code:'K',ddm:0.410 ,ddf:0.510 },
            {code:'KD',ddm:0.560 ,ddf:0.660 },
            {code:'KDD',ddm:0.700 ,ddf:0.800 },
            {code:'KM',ddm:0.560 ,ddf:0.660 },
            {code:'KMG',ddm:0.690 ,ddf:0.790 },
            {code:'KT',ddm:0.530 ,ddf:0.630 },
            {code:'KTT',ddm:0.640 ,ddf:0.740 },
            {code:'KX',ddm:0.560 ,ddf:0.660 },
            {code:'KXG',ddm:0.690 ,ddf:0.790 },
            {code:'KY',ddm:0.560 ,ddf:0.660 },
            {code:'KYG',ddm:0.690 ,ddf:0.790 },
            {code:'M',ddm:0.410 ,ddf:0.510 },
            {code:'MG',ddm:0.540 ,ddf:0.640 },
            {code:'MS',ddm:0.530 ,ddf:0.630 },
            {code:'MSG',ddm:0.660 ,ddf:0.760 },
            {code:'S',ddm:0.380 ,ddf:0.480 },
            {code:'SD',ddm:0.530 ,ddf:0.630 },
            {code:'SDG',ddm:0.660 ,ddf:0.760 },
            {code:'SG',ddm:0.510 ,ddf:0.610 },
            {code:'SM',ddm:0.530 ,ddf:0.630 },
            {code:'SS',ddm:0.500 ,ddf:0.600 },
            {code:'SSG',ddm:0.630 ,ddf:0.730 },
            {code:'SSS',ddm:0.610 ,ddf:0.710 },
            {code:'SSSG',ddm:0.740 ,ddf:0.840 },
            {code:'ST',ddm:0.500 ,ddf:0.600 },
            {code:'STG',ddm:0.630 ,ddf:0.730 },
            {code:'STK',ddm:0.640 ,ddf:0.740 },
            {code:'STKG',ddm:0.770 ,ddf:0.870 },
            {code:'STS',ddm:0.610 ,ddf:0.710 },
            {code:'STSG',ddm:0.740 ,ddf:0.840 },
            {code:'STT',ddm:0.610 ,ddf:0.710 },
            {code:'STTG',ddm:0.740 ,ddf:0.840 },
            {code:'STTK',ddm:0.720 ,ddf:0.820 },
            {code:'STTKG',ddm:0.850 ,ddf:0.950 },
            {code:'STTS',ddm:0.690 ,ddf:0.790 },
            {code:'STTSG',ddm:0.820 ,ddf:0.920 },
            {code:'STTX',ddm:0.720 ,ddf:0.820 },
            {code:'STTXG',ddm:0.850 ,ddf:0.950 },
            {code:'STTY',ddm:0.720 ,ddf:0.820 },
            {code:'STTYG',ddm:0.850 ,ddf:0.950 },
            {code:'STX',ddm:0.640 ,ddf:0.740 },
            {code:'STXG',ddm:0.770 ,ddf:0.870 },
            {code:'STY',ddm:0.640 ,ddf:0.740 },
            {code:'STYG',ddm:0.770 ,ddf:0.870 },
            {code:'SX',ddm:0.530 ,ddf:0.630 },
            {code:'SXG',ddm:0.660 ,ddf:0.760 },
            {code:'SXS',ddm:0.640 ,ddf:0.740 },
            {code:'SXSG',ddm:0.770 ,ddf:0.870 },
            {code:'SXSXS',ddm:0.790 ,ddf:0.890 },
            {code:'SY',ddm:0.530 ,ddf:0.630 },
            {code:'SYG',ddm:0.660 ,ddf:0.760 },
            {code:'SYS',ddm:0.640 ,ddf:0.740 },
            {code:'SYSG',ddm:0.770 ,ddf:0.870 },
            {code:'SZ',ddm:0.520 ,ddf:0.620 },
            {code:'SZG',ddm:0.650 ,ddf:0.750 },
            {code:'T',ddm:0.380 ,ddf:0.480 },
            {code:'TD',ddm:0.530 ,ddf:0.630 },
            {code:'TDG',ddm:0.660 ,ddf:0.760 },
            {code:'TG',ddm:0.510 ,ddf:0.610 },
            {code:'TK',ddm:0.530 ,ddf:0.630 },
            {code:'TKG',ddm:0.660 ,ddf:0.760 },
            {code:'TM',ddm:0.530 ,ddf:0.630 },
            {code:'TMG',ddm:0.660 ,ddf:0.760 },
            {code:'TS',ddm:0.500 ,ddf:0.600 },
            {code:'TSG',ddm:0.630 ,ddf:0.730 },
            {code:'TSS',ddm:0.610 ,ddf:0.710 },
            {code:'TSSG',ddm:0.740 ,ddf:0.840 },
            {code:'TST',ddm:0.610 ,ddf:0.710 },
            {code:'TSTG',ddm:0.740 ,ddf:0.840 },
            {code:'TSTS',ddm:0.690 ,ddf:0.790 },
            {code:'TSTSG',ddm:0.820 ,ddf:0.920 },
            {code:'TT',ddm:0.500 ,ddf:0.600 },
            {code:'TTD',ddm:0.640 ,ddf:0.740 },
            {code:'TTDD',ddm:0.750 ,ddf:0.850 },
            {code:'TTDDG',ddm:0.880 ,ddf:0.980 },
            {code:'TTG',ddm:0.630 ,ddf:0.730 },
            {code:'TTK',ddm:0.640 ,ddf:0.740 },
            {code:'TTKG',ddm:0.770 ,ddf:0.870 },
            {code:'TTS',ddm:0.610 ,ddf:0.710 },
            {code:'TTSG',ddm:0.740 ,ddf:0.840 },
            {code:'TTT',ddm:0.610 ,ddf:0.710 },
            {code:'TTTG',ddm:0.740 ,ddf:0.840 },
            {code:'TTTS',ddm:0.690 ,ddf:0.790 },
            {code:'TTTSG',ddm:0.820 ,ddf:0.920 },
            {code:'TTTT',ddm:0.690 ,ddf:0.790 },
            {code:'TTTTG',ddm:0.820 ,ddf:0.920 },
            {code:'TTTTS',ddm:0.730 ,ddf:0.830 },
            {code:'TTTTT',ddm:0.730 ,ddf:0.830 },
            {code:'TTTTTG',ddm:0.860 ,ddf:0.960 },
            {code:'X',ddm:0.410 ,ddf:0.510 },
            {code:'XG',ddm:0.540 ,ddf:0.640 },
            {code:'XK',ddm:0.560 ,ddf:0.660 },
            {code:'XKG',ddm:0.690 ,ddf:0.790 },
            {code:'XKX',ddm:0.700 ,ddf:0.800 },
            {code:'XKXG',ddm:0.830 ,ddf:0.930 },
            {code:'XS',ddm:0.530 ,ddf:0.630 },
            {code:'XSG',ddm:0.660 ,ddf:0.760 },
            {code:'XSX',ddm:0.670 ,ddf:0.770 },
            {code:'XSXG',ddm:0.800 ,ddf:0.900 },
            {code:'XTT',ddm:0.640 ,ddf:0.740 },
            {code:'XTTG',ddm:0.770 ,ddf:0.870 },
            {code:'XTTS',ddm:0.720 ,ddf:0.820 },
            {code:'XTTSG',ddm:0.850 ,ddf:0.950 },
            {code:'XTTT',ddm:0.720 ,ddf:0.820 },
            {code:'XTTTG',ddm:0.850 ,ddf:0.950 },
            {code:'XTTX',ddm:0.750 ,ddf:0.850 },
            {code:'Y',ddm:0.410 ,ddf:0.510 },
            {code:'YG',ddm:0.540 ,ddf:0.640 },
            {code:'YK',ddm:0.560 ,ddf:0.660 },
            {code:'YKG',ddm:0.690 ,ddf:0.790 },
            {code:'YKX',ddm:0.700 ,ddf:0.800 },
            {code:'YKXG',ddm:0.830 ,ddf:0.930 },
            {code:'YS',ddm:0.530 ,ddf:0.630 },
            {code:'YS',ddm:0.530 ,ddf:0.630 },
            {code:'YSG',ddm:0.660 ,ddf:0.760 },
            {code:'YSG',ddm:0.660 ,ddf:0.760 },
            {code:'YT',ddm:0.530 ,ddf:0.630 },
            {code:'YTG',ddm:0.660 ,ddf:0.760 },
            {code:'YTS',ddm:0.640 ,ddf:0.740 },
            {code:'YTSG',ddm:0.770 ,ddf:0.870 },
            {code:'YTTS',ddm:0.720 ,ddf:0.820 },
            {code:'YTTSG',ddm:0.850 ,ddf:0.950 },
            {code:'YXS',ddm:0.670 ,ddf:0.770 },
            {code:'YXSG',ddm:0.800 ,ddf:0.900 },
            {code:'Z',ddm:0.400 ,ddf:0.500 },
            {code:'ZG',ddm:0.530 ,ddf:0.630 }
        ],
        aircode_spn: [
            {code:'-',ddm:0.000 ,ddf:0.000 },
            {code:'3',ddm:0.650 ,ddf:0.750 },
            {code:'3p',ddm:0.680 ,ddf:0.780 },
            {code:'3G',ddm:0.780 ,ddf:0.900 },
            {code:'7',ddm:0.850 ,ddf:1.000 },
            {code:'7p',ddm:0.880 ,ddf:1.030 },
            {code:'7G',ddm:0.980 ,ddf:1.150 },
            {code:'10',ddm:1.020 ,ddf:1.120 },
            {code:'10p',ddm:1.050 ,ddf:1.150 },
            {code:'10G',ddm:1.150 ,ddf:1.270 }
/*            ,
            {code:'3pG',ddm:0.810 ,ddf:0.930 },
            {code:'3pp',ddm:0.710 ,ddf:0.810 },
            {code:'3ppp',ddm:0.740 ,ddf:0.840 },
            {code:'3w',ddm:0.710 ,ddf:0.810 },
            {code:'3ww',ddm:0.770 ,ddf:0.870 },
            {code:'7pG',ddm:1.010 ,ddf:1.180 },
            {code:'7pp',ddm:0.910 ,ddf:1.060 },
            {code:'7ppp',ddm:0.940 ,ddf:1.090 },
            {code:'7w',ddm:0.910 ,ddf:1.060 },
            {code:'7ww',ddm:0.970 ,ddf:1.120 },
            {code:'10pG',ddm:1.180 ,ddf:1.300 },
            {code:'10pp',ddm:1.080 ,ddf:1.180 },
            {code:'10ppG',ddm:1.210 ,ddf:1.330 }
*/
        ],
        aircode_flip: [
            {code:'-',ddm:0.000 ,ddf:0.000 },
            {code:'bT',ddm:0.700 ,ddf:0.800 },
            {code:'bP',ddm:0.700 ,ddf:0.800 },
            {code:'bL',ddm:0.720 ,ddf:0.820 },
            {code:'bp',ddm:0.730 ,ddf:0.830 },
            {code:'bG',ddm:0.830 ,ddf:0.930 },
            {code:'bF',ddm:0.880 ,ddf:1.030 },
            {code:'bdF',ddm:1.020 ,ddf:1.120 },
            {code:'btF',ddm:1.190 ,ddf:1.290 },
            {code:'fT',ddm:0.740 ,ddf:0.840 },
            {code:'fP',ddm:0.740 ,ddf:0.840 },
            {code:'fp',ddm:0.770 ,ddf:0.870 },
            {code:'fG',ddm:0.830 ,ddf:0.930 },
            {code:'fF',ddm:0.870 ,ddf:1.020 }
/*            ,
            {code:'bFG',ddm:1.010 ,ddf:1.160 },
            {code:'bFp',ddm:0.910 ,ddf:1.060 },
            {code:'bLp',ddm:0.750 ,ddf:0.850 },
            {code:'bPG',ddm:0.830 ,ddf:0.930 },
            {code:'bPp',ddm:0.730 ,ddf:0.830 },
            {code:'bPpG',ddm:0.860 ,ddf:0.960 },
            {code:'fdF',ddm:1.020 ,ddf:1.120 },
            {code:'fL',ddm:0.740 ,ddf:0.840 },
            {code:'fpG',ddm:0.860 ,ddf:0.960 },
            {code:'fPpG',ddm:0.860 ,ddf:0.960 },
            {code:'fPG',ddm:0.830 ,ddf:0.930 },
            {code:'fTG',ddm:0.830 ,ddf:0.93},
            {code:'fTp',ddm:0.770 ,ddf:0.870 }
*/
        ],      
        aircode_3d: [
            {code:'-',ddm:0.000 ,ddf:0.000 },
            {code:'7o',ddm:0.830 ,ddf:0.980 },
            {code:'7oG',ddm:0.960 ,ddf:1.130 },
            {code:'7op',ddm:0.860 ,ddf:1.010 },
            {code:'10o',ddm:0.990 ,ddf:1.090 },
            {code:'10oG',ddm:1.120 ,ddf:1.240 },
            {code:'10op',ddm:1.020 ,ddf:1.120 },
            {code:'14o',ddm:1.110 ,ddf:1.210 },
            {code:'14oG',ddm:1.240 ,ddf:1.340 },
            {code:'14op',ddm:1.140 ,ddf:1.240 },
            {code:'3o',ddm:0.710 ,ddf:0.810 },
            {code:'3oG',ddm:0.840 ,ddf:0.960 },
            {code:'3op',ddm:0.740 ,ddf:0.840 },
            {code:'l',ddm:0.710 ,ddf:0.810 },
            {code:'lF',ddm:0.840 ,ddf:0.930 },
            {code:'lG',ddm:0.830 ,ddf:0.940 },
            {code:'lGF',ddm:0.970 ,ddf:1.090 },
            {code:'lp',ddm:0.740 ,ddf:0.840 },
            {code:'lpF',ddm:0.870 ,ddf:0.970 },
            {code:'lGF',ddm:1.01 ,ddf:1.11 }
        ],      
        temp: 0,
        scale: 1
    },
    methods: {
        culculate_air: function() {
        /*
        this.base_point = Number(this.carving_point) + Number(this.absext_point) + Number(this.upper_point)
        this.base_point = this.base_point * 10 // 10 で乗算
        this.base_point = Math.round(this.base_point) // 四捨五入
        this.base_point = this.base_point / 10 // 10 で除算
        this.base_point = this.base_point.toFixed(1)

        this.turn_point = Number(this.base_point) - Number(this.deduction)
        this.turn_point = this.turn_point * 10 // 10 で乗算
        this.turn_point = Math.round(this.turn_point) // 四捨五入
        this.turn_point = this.turn_point / 10 // 10 で除算
        this.turn_point = this.turn_point.toFixed(1)
        */
        },
        onBase: function (e) {
            this.base_point = e.target.value
            this.culculate_air()
        },
        //エアポイント1スライダ
        onAirPoint1: function (e) {
            this.air_point1 = e.target.value
            this.loadLevelString1()
            this.culculate_air()
        },
        //エアポイント2スライダ
        onAirPoint2: function (e) {
            this.air_point2 = e.target.value
            this.loadLevelString2()
            this.culculate_air()
        },
        //軸評価10点満点
        onTapAxis10_1: function (e) {
            this.current_max1 = 10.0
            this.air_point1 = this.current_max1 
        },
        onTapAxis10_2: function (e) {
            this.current_max2 = 10.0
            this.air_point2 = this.current_max2 
        },
        //軸評価08点満点
        onTapAxis08_1: function (e) {
            this.current_max1 = 8.0
            this.air_point1 = this.current_max1 
        },
        onTapAxis08_2: function (e) {
            this.current_max2 = 8.0
            this.air_point2 = this.current_max2 
        },
        //軸評価04点満点
        onTapAxis04_1: function (e) {
            this.current_max1 = 4.0
            this.air_point1 = this.current_max1 
        },
        onTapAxis04_2: function (e) {
            this.current_max2 = 4.0
            this.air_point2 = this.current_max2 
        },
        //Grab軸評価10点満点
        onTapGrab10_1: function (e) {
            this.current_max1 = 10.0
            this.air_point1 = this.current_max1 
        },
        onTapGrab10_2: function (e) {
            this.current_max2 = 10.0
            this.air_point2 = this.current_max2 
        },
        //Grab評価06点満点
        onTapGrab06_1: function (e) {
            this.current_max1 = 6.0
            this.air_point1 = this.current_max1 
        },
        onTapGrab06_2: function (e) {
            this.current_max2 = 6.0
            this.air_point2 = this.current_max2 
        },
        //Grab評価04点満点
        onTapGrab04_1: function (e) {
            this.current_max1 = 4.0
            this.air_point1 = this.current_max1 
        },
        onTapGrab04_2: function (e) {
            this.current_max2 = 4.0
            this.air_point2 = this.current_max2 
        },

        //エアカテゴリ変更
        onSelectFlip1: function (e) {
            this.aircodecategories1 = this.aircode_flip 
            this.loadGrabStatus1()
        },
        onSelectFlip2: function (e) {
            this.aircodecategories2 = this.aircode_flip 
            this.loadGrabStatus2()
        },
        onSelect3D1: function (e) {
            this.aircodecategories1 = this.aircode_3d 
            this.loadGrabStatus1()
        },
        onSelect3D2: function (e) {
            this.aircodecategories2 = this.aircode_3d 
            this.loadGrabStatus2()
        },
        onSelectSpn1: function (e) {
            this.aircodecategories1 = this.aircode_spn 
            this.loadGrabStatus1()
        },        
        onSelectSpn2: function (e) {
            this.aircodecategories2 = this.aircode_spn 
            this.loadGrabStatus1()
        },        
        onSelectUp1: function (e) {
            this.aircodecategories1 = this.aircode_up 
            this.loadGrabStatus1()
        },
        onSelectUp2: function (e) {
            this.aircodecategories2 = this.aircode_up 
            this.loadGrabStatus2()
        },
        
        loadGrabStatus1: function() {
            let result = this.air_code1.indexOf('G');
            if(result>=0){
                this.isGrab1 = false
            }else{
                this.isGrab1 = true
            }
        },        
        loadGrabStatus2: function() {
            let result = this.air_code2.indexOf('G');
            if(result>=0){
                this.isGrab2 = false
            }else{
                this.isGrab2 = true
            }
        },
        onSelectJP: function(airno, point){
            if(airno==1){
                this.air_point1 = point;
            }else{
                this.air_point2 = point;
            }
        },

        //エアポイントレベル文字
        loadLevelString1: function(air_point1) {
            if(this.air_point1>=0 && this.air_point1<2.1){
                this.level1 = "Very Poor Jump"
            }else if(this.air_point1>=2.1 && this.air_point1<4.1){
                this.level1 = "Poor Jump"
            }else if(this.air_point1>=4.1 && this.air_point1<6.1){
                this.level1 = "Average Jump"
            }else if(this.air_point1>=6.1 && this.air_point1<8.1){
                this.level1 = "Good Jump"
            }else if(this.air_point1>=8.1){
                this.level1 = "Excellent Jump"
            }
            return this.level1
        },
        loadLevelString2: function(air_point2) {
            if(this.air_point2>=0 && this.air_point2<2.1){
                this.level2 = "Very Poor Jump"
            }else if(this.air_point2>=2.1 && this.air_point2<4.1){
                this.level2 = "Poor Jump"
            }else if(this.air_point2>=4.1 && this.air_point2<6.1){
                this.level2 = "Average Jump"
            }else if(this.air_point2>=6.1 && this.air_point2<8.1){
                this.level2 = "Good Jump"
            }else if(this.air_point2>=8.1){
                this.level2 = "Excellent Jump"
            }
            return this.level2
        },

        //エアコード
        onChangeDD1: function (e) {
            this.air_code1 = e.target.value
            this.loadGrabStatus1()
        },
        onChangeDD2: function (e) {
            this.air_code2 = e.target.value
            this.loadGrabStatus2()
        },
        //現在の選択選手読み込み
        getCurrentRaceInfo: function() {
            /*common用のapp.blade.phpへ出力*/
            appcommon.getCurrentPacetime();
            appcommon.getCurrentRacer();
        },

        //再申請
        onReapply: function(e) {
            this.temp = e.target.value
        },
        //確定
        onConfirm: function(e) {    
            this.temp = e.target.value
            console.log("onConfirm");
            //apiで登録（とりあえずカレントテーブルに登録→ターンジャッジテーブルに登録するのは後日）
            _self = this;
            for( var key in _self.aircodecategories1 ) {
                var val = _self.aircodecategories1[key];
                console.log(val.code);
                if(val.code == _self.air_code1){
                    if(_self.sex == 'F'){
                        _self.air_dd1 = val.ddf;
                    }else{
                        _self.air_dd1 = val.ddm;
                    }
                    break;
                }
            }
            for( var key in _self.aircodecategories2 ) {
                var val = _self.aircodecategories2[key];
                console.log(val.code);
                if(val.code == _self.air_code2){
                    if(_self.sex == 'F'){
                        _self.air_dd2 = val.ddf;
                    }else{
                        _self.air_dd2 = val.ddm;
                    }
                    break;
                }
            }



            $.ajax({
                type: 'post',
                url: "/currentresult/postcurrent",
                data: {
                    air_point1: _self.air_point1,
                    air_point2: _self.air_point2,
                    air_code1: _self.air_code1,
                    air_code2: _self.air_code2,
                    air1_dd: _self.air_dd1,
                    air2_dd: _self.air_dd2,
                },
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("onConfirm OK");
                    _self.message = "ヘッドジャッジの画面に更新しました。";
                    _self.$nextTick(function(){
                        setTimeout(function(){
                            _self.message = "";
                            _self.getCurrentRaceInfo();
                        }, 3000);
                    });
                },
                error: function(err) {
                    console.log("onConfirm NG "+ err.responseJSON.message);
                    _self.message = "更新に失敗しました。"+err.massege;
                    _self.$nextTick(function(){
                        setTimeout(function(){_self.message = "";}, 3000);
                    });
                }
            });
    
        },
    },
    mounted() {
        _self = this;
        console.log("mounted");
        this.$nextTick(function () {
            // ビュー全体がレンダリングされた後にのみ実行されるコード
            console.log("nextTick");
            //_self.getCurrentResult();
            appcommon.getCurrentRacer();
        })
    },
}
)
  
/**
 * 
 * 
                        <option v-for="aircode1 in aircodecategories" v-bind:value="aircode1.code">{{ aircode1.code }}</option>
                        <option v-for="aircode2 in aircodecategories" v-bind:value="aircode2.code">{{ aircode2.code }}</option>

 */