<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>{{__('words.name')}}</th>
            <th>{{__('words.description')}}</th>
            <th>{{__('words.startDate')}}</th>
            <th>{{__('words.endDate')}}</th>
            <th>{{__('words.actions')}}</th>
        </tr>
    </thead>
    <tbody>
       @include('project.search')
    </tbody>
</table>
<input type="hidden" id="hidden_page" value="1">