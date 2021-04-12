<template>
<!-- templateタグの中は一度全体を親要素で囲う必要があります。 -->
    <div class="content">
        <div class="button-area">
            <span @click="prevMonth" class="material-icons right-arrow-icon">arrow_back_ios</span>
            <span class="year-month">{{ displayDate }}</span>
            <span @click="nextMonth" class="material-icons left-arrow-icon">arrow_forward_ios</span>
        </div>
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
                        {{ day.date }}<br>
                        {{ displayDate }}<br>{{ index }}<br>{{ user_id }}
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
            // user_id
            user_id: this.$userId,
        };
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
                        month: calendarDate.format("YYYY-MM")
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
        }
    },

    // DOM生成後にmounted関数を通る
    // mounted() {
    //     console.log(this.getCalendar());
    // },

    computed: {
        
        calendars() {
            return this.getCalendar();
        },

        displayDate(){
            return this.currentDate.format('YYYY[年]M[月]');
        },

        currentMonth() {
            return this.currentDate.format('YYYY-MM');
        },
        
    },

}
</script>