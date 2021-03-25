@section('sideber')
<div class="sideber">
    <section class="sidebarItem">
        <a href="{{ url('/top') }}">トップ</a> 
    </section>
    <section class="sidebarItem">
        <a href="{{ url('/schedule') }}">スケジュール</a> 
    </section>
    <section class="sidebarItem">
        <a href="{{ url('/progress') }}">進捗</a>
    </section>
</div>
@endsection