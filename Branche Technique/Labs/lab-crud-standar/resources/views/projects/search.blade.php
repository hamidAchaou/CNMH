{{-- get data Projects --}}
@foreach ($projects as $project)
    <tr>
        <td>{{ $project->name }}</td>
        <td>{{ $project->description }}</td>
        <td class="text-center">
            <a href="{{ route('tasks.show', ['id' => $project->id]) }}" class="btn btn-default text-center">
                <i class="fa-solid fa-eye"></i>
            </a>
        </td>
    </tr>
@endforeach
<tr>
    <td></td>
    <td></td>
    <td colspan="3" align="center" class="pagination d-flex flex-row-reverse">
        {!! $projects->links() !!}
    </td>
</tr>
