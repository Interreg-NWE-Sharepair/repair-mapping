@foreach (['danger', 'warning', 'success', 'info'] as $type)
    @if(Session::has($type))
        <div class="flex align-middle font-medium text-sm text-{{ $type }}-600 {{ $attributes->get('class') }}" {{ $attributes }}>
            {!! Session::get($type) !!}
        </div>
    @endif
@endforeach

