<li class="nav-item">
    <form action="{{route('locale' , $language)}}" method="post">
        @csrf
        <button type="submit" class="nav-link border-0 bg-white" value="{{ $language }}"><span class="flag-icon flag-icon-{{ $nation }}"></span></button>
    </form>
</li>
