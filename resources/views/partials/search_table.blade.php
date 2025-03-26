@foreach ($search_result as $character)
<tr>
    <td class=""><img src="{{ $character->image }}" alt="" style="width: 55px;"></td>
    <td class=""><a href="{{ route('show', $character->id) }}">{{ $character->name }}</a></td>
    <td>{{ $character->status }}</td>
    <td>{{ $character->species }}</td>
    <td>{{ $character->gender }}</td>
    @if($character->location)
        <td>{{ $character->location->name }}</td>
    @else
        <td>Неизвестно</td>
    @endif
</tr>
@endforeach