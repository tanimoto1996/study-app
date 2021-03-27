@section('sideber')
<link href="{{ asset('css/sideber.css') }}" rel="stylesheet">
<div class="sideber">
    <section class="sidebarItem">
        <a href="{{ url('/top') }}">トップ</a> 
    </section>
    <section class="sidebarItem">
        <a href="{{ url('/schedule') }}">スケジュール</a> 
    </section>
    <section class="sidebarItem">
        <a href="{{ url('/note') }}">進捗</a>
    </section>
</div>
@endsection