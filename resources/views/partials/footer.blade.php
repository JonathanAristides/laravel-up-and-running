<h1>
    Footer
</h1>
{{--#22--}}
Class Based User Count: {{$userCountFromClass}}

{{--#23--}}
@inject('metrics', 'App\Services\TestService')
<p>Monthly Users: {{ $metrics->monthlyUsers() }}</p>
<p>Activity Rate: {{ $metrics->activeRate() * 100 }}%</p>
