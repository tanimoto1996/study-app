<template>
<!-- templateタグの中は一度全体を親要素で囲う必要があります。 -->
<div class="content">
    <h2>カレンダー {{ displayDate }}</h2>
    <div class="button-area">
        <button @click="prevMonth" class="button">前の月</button>
        <button @click="nextMonth" class="button">次の月</button>
    </div>
    <!-- indexは何番目かが代入されている。keyをすることをvueでは推薦している -->
    <!-- 中身の配列も使用することができる？ -->
    <div class="calendar">
        <div class="calendar-weekly">
            <div class="calendar-youbi" v-for="n in 7" :key="n">
                {{ youbi(n-1) }}
            </div>
        </div>
        <div 
            class="calendar-weekly"
            v-for="(week, index) in calendars"
            :key="index"
        >
            <div
                :class="{outside: currentMonth !== day.month}" 
                class="calendar-daily"
                v-for="(day, index) in week"
                :key="index"
            >
                <div class="calendar-day">
                    {{ day.date }}
                </div>
                <div v-for="dayEvent in day.dayEvents" :key="dayEvent.id" >
                <div 
                class="calendar-event"
                :style="`width:${dayEvent.width}%;background-color:${dayEvent.color}`" 
                draggable="true" >
                    {{ dayEvent.name }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import moment from "moment";
export default {
    data() {
        return {
            // 現在時刻をcurrentDateに代入する
            currentDate: moment(),
            // dataプロパティの中に連想配列を作成する（ここはDBで値を持す必要がある
            // dataは状態を置くところですから、基本ここで何らかの処理を行うものではありません。
            events: [
                { id: 1, name: "ミーティング", start: "2021-04-01", end:"2021-04-01", color:"blue"},
                { id: 2, name: "イベント", start: "2021-04-02", end:"2021-04-03", color:"limegreen"},
                { id: 3, name: "会議", start: "2021-04-06", end:"2021-04-06", color:"deepskyblue"},
                { id: 4, name: "有給", start: "2021-04-08", end:"2021-04-08", color:"dimgray"},
                { id: 5, name: "海外旅行", start: "2021-04-08", end:"2021-04-11", color:"navy"},
                { id: 6, name: "誕生日", start: "2021-04-16", end:"2021-04-16", color:"orange"},
                { id: 7, name: "イベント", start: "2021-04-12", end:"2021-04-15", color:"limegreen"},
                { id: 8, name: "出張", start: "2021-04-12", end:"2021-04-13", color:"teal"},
                { id: 9, name: "客先訪問", start: "2021-04-14", end:"2021-04-14", color:"red"},
                { id: 10, name: "パーティ", start: "2021-04-15", end:"2021-04-15", color:"royalblue"},
                { id: 12, name: "ミーティング", start: "2021-04-18", end:"2021-04-19", color:"blue"},
                { id: 13, name: "イベント", start: "2021-04-21", end:"2021-04-21", color:"limegreen"},
                { id: 14, name: "有給", start: "2021-04-20", end:"2021-04-20", color:"dimgray"},
                { id: 15, name: "イベント", start: "2021-04-25", end:"2021-04-28", color:"limegreen"},
                { id: 16, name: "会議", start: "2021-04-21", end:"2021-04-21", color:"deepskyblue"},
                { id: 17, name: "旅行", start: "2021-04-23", end:"2021-04-24", color:"navy"},
                { id: 18, name: "ミーティング", start: "2021-04-28", end:"2021-04-28", color:"blue"},
                { id: 19, name: "会議", start: "2021-04-12", end:"2021-04-12", color:"deepskyblue"},
                { id: 20, name: "誕生日", start: "2021-04-30", end:"2021-04-30", color:"orange"},
            ]
        }
    },
    // メソッドを記入するためのプロパティ
    methods: {
        // 最初の月曜日を取得するメソッド
        getStartDate() {
            // 今の時刻をdateに代入？コピーを行う
            let date = moment(this.currentDate);
            // 月の始まりを呼び出す
            date.startOf("months");
            // 現在の月の始まりの日付を出してくれる 例）1 or 2
            // 日曜日始まりにするために、日曜日までの間の日数を取得
            const youbiNum = date.day();
            // カレンダーを別の日に変えるメソッド
            // 第二引数にdaysを入れれば日での引き算をしてくれる
            return date.subtract(youbiNum, "days");
        },
        // 最後の土曜日を取得するメソッド
        getEndDate() {
            let date = moment(this.currentDate);
            date.endOf("months");
            const youbiNum = date.day();
            // 土曜日の日付を出すために６引く
            return date.add(6 - youbiNum, "days");
        },

        getCalendar() {
            const startDate = this.getStartDate();
            const endDate = this.getEndDate();
            const weekNumber = Math.ceil(endDate.diff(startDate, "days") / 7);

            let calendars = [];
            let calendarDate = this.getStartDate();


            for (let week = 0; week < weekNumber; week++) {
                let weekRow = [];
                for (let day = 0; day < 7; day++) {
                    weekRow.push({
                        date: calendarDate.get("date"),
                        month: calendarDate.format('YYYY-MM'),
                    });
                    calendarDate.add(1, "days");
                }
                calendars.push(weekRow);
            }
            return calendars;
        },

        nextMonth() {
            this.currentDate = moment(this.currentDate).add(1, "month");
        },

        prevMonth() {
            this.currentDate = moment(this.currentDate).subtract(1, "month");
        },

        youbi(dayIndex) {
            const week = ["月", "火", "水", "木", "金", "土", "日"];
            return week[dayIndex];
        },

        // getDayEvents(date){
        //     
        //     // return すると関数の中身が返される
        //     // filter関数は与えられた関数によって実装されたテストに合格したすべての配列からなる新しい配列を生成します。
        //     return this.events.filter(event => {
        //         // eventsオブジェクトのstartプロパティの値を取得
        //         let startDate = moment(event.start).format('YYYY-MM-DD')
        //         // eventsオブジェクトのendプロパティの値を取得
        //         let endDate = moment(event.end).format('YYYY-MM-DD')
        //         // カレンダーで表示されている一番若い日付を取得 例）3/28を取得  now 4/05
        //         let Date = date.format('YYYY-MM-DD')
        //         // 開始日より終了日が上回っていた場合に「true」を返す。
        //         // trueを返すと戻り値に日付が入っていないので、表示されない
        //         if(startDate <= Date && endDate >= Date) return true;
        //     });
        // }

        getEventWidth(end, start, day){
            let betweenDays = moment(end).diff(moment(start), "days")
            if(betweenDays > 6 - day){
                return (6 - day) * 100 + 95; 
            }else{
                return betweenDays * 100 + 95;
            }
        },

        getDayEvents(date, day){
        let dayEvents = [];
        this.events.forEach(event => {
            let startDate = moment(event.start).format('YYYY-MM-DD')
            let endDate = moment(event.end).format('YYYY-MM-DD')
            let Date = date.format('YYYY-MM-DD')

            if(startDate <= Date && endDate >= Date){
            if(startDate === Date){
                let width = this.getEventWidth(endDate, startDate, day)
                dayEvents.push({...event,width})
            }else if(day === 0){
                let width = this.getEventWidth(date, endDate, day)
                dayEvents.push({...event,width})
            }
            }
        });
        return dayEvents;
        },

        getStackEvents(event, day, calendarDate, stackIndex, dayEvents, startedEvents, start){
            [stackIndex, startedEvents, dayEvents] = this.getStartedEvents(event, stackIndex, startedEvents, dayEvents)
                let width = this.getEventWidth(start, event.end, day)
                Object.assign(event,{
                    stackIndex
            })
            dayEvents.push({...event, width})
            stackIndex++;
            return [stackIndex,dayEvents,startedEvents];
        },

        getStartedEvents(event, stackIndex, startedEvents, dayEvents){
            let startedEvent;
            do{
                startedEvent = startedEvents.find(event <= event.stackIndex === stackIndex)
                if(startedEvent) {
                dayEvents.push(startedEvent)
                stackIndex++;
                }
            }while(typeof startedEvent !== 'undefined')
            return [stackIndex, startedEvents, dayEvents]
        },


    },  
    // DOM生成後にmounted関数を通る
    // mounted() {
    //     console.log(this.getCalendar());
    // },

    computed: {
        
        calendars() {
            return this.getCalendar();
        },

        displayDate() {
            return  this.currentDate.format('YYYY-MM');
        },

        currentMonth() {
            return this.currentDate.format('YYYY-MM');
        },
        sortedEvents(){
            return this.events.slice().sort(function(a,b) {
                let startDate = moment(a.start).format('YYYY-MM-DD')
                let endDate = moment(b.start).format('YYYY-MM-DD')
                if( startDate < endDate ) return -1;
                if( startDate > endDate ) return 1;
                return 0;
            })
        },
        
    },

}
</script>