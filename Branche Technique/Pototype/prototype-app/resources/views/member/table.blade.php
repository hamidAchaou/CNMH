<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>{{ __('words.name') }}</th>
            <th>{{ __('words.email') }}</th>
            @role('project-leader')
            <th>action</th>
            @endrole
        </tr>
    </thead>
    <tbody>
       @include('member.search')
    </tbody>
</table>
<input type="hidden" id="page_hidden" value="1" />