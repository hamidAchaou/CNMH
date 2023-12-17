<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>{{__('words.name')}}</th>
            <th>{{__('words.description')}}</th>
            <th>{{__('words.startDate')}}</th>
            <th>{{__('words.endDate')}}</th>
            @role('project-leader')
                <th>{{__('words.actions')}}</th>
            @endrole
        </tr>
    </thead>
    <tbody class="tasks-container">
       @include('tasks.search')
    </tbody>
</table>
<input type="hidden" id="page_hidden" value="1">
