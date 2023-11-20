@foreach ($members as $member)
<tr>
    <td>{{ $member->firstName }}</td>
    <td>
        {{ $member->lastName }}
    </td>
    <td>
        {{ $member->email }}
    </td>
    <td>
        {{-- btn edit --}}
        <a href="{{ route('members.edit', ['member' => $member->id]) }}"
            class="btn btn-sm btn-default">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        {{-- btn delete --}}
        <button type="button" class="btn btn-sm btn-danger"
            onclick="AddIdMembers({{ $member->id }})" data-toggle="modal"
            data-target="#modalDeleteMember"><i
                class="fa-solid fa-trash"></i></button>
    </td>
</tr>
@endforeach
<tr>
    <td>
        <div class="d-flex align-items-center">
            @can('create', App\Models\Member::class)
                <form action="{{ route('members.import') }}" method="post"
                    enctype="multipart/form-data" id="importForm">
                    @csrf
                    <label for="upload" class="btn btn-default  mb-0 font-weight-normal">
                        <i class="fa-solid fa-file-arrow-down"></i>
                        {{ __('words.import') }}
                    </label>
                    <input type="file" id="upload" name="file" style="display:none;" />
                </form>
            @endcan
            <a href="{{ route('members.import') }}" class="btn  btn-default  mt-0 mx-2">
                <i class="fa-solid fa-file-export"></i>
                {{ __('words.export') }}
            </a>
        </div>
    </td>
    <td></td>
    <td colspan="3" class="d-flex flex-row-reverse bd-highlight">
        {!! $members->links() !!}
    </td>
</tr>