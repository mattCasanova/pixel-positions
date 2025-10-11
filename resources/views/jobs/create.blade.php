<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form action="/jobs" method="POST">
        <x-forms.input name="title" label="Title" placeholder="CEO" />
        <x-forms.input name="salary" label="Salary" placeholder="$90,000" />
        <x-forms.input name="location" label="Location" placeholder="Winter Park, Florida"/>

        <x-forms.select label="Schedule" name="schedule">
            <option>Full-time</option>
            <option>Part-time</option>
            <option>Contract</option>
            <option>Internship</option>
        </x-forms.select>

        <x-forms.input name="url" label="url" placeholder="https:://acme.com/jobs/ceo-wanted" />
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" />

        <x-forms.divider />
        <x-forms.input name="tags" label="Tags (comma separated)" placeholder="laracasts, video, education" />

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
