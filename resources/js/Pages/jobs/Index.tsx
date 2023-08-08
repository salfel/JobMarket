import {Job, Pagination} from "@/lib/types";
import JobPreview from "@/components/JobPreview";
import {Input} from "@/components/ui/input";
import ComboBox from "@/components/ComboBox";
import {regions as _regions} from "@/lib/constants";
import {Button} from "@/components/ui/button";
import React, {useState} from "react";
import {router} from "@inertiajs/react";

interface Props {
	jobs: Pagination<Job>
}

export default function Index({ jobs }: Props) {
	const [regions, setRegions] = useState<string[]>(new URL(location.href).searchParams.get('region')?.split(','))
	const [search, setSearch] = useState(new URL(location.href).searchParams.get('q') ?? '')

	const handleSearch = () => {
		const searchParams = new URLSearchParams()
		if (regions.length > 0) searchParams.set('region', regions.join(','))
		if (search) searchParams.set('q', search);
		router.visit('/jobs?' + searchParams.toString(), {
			only: ['jobs'],
			preserveState: true
		})
	}
	return (
		<>
			<div className="flex items-center gap-5 mb-5">
				<Input type="text" role="search" value={search} placeholder="Search..." className="w-52" onChange={e => setSearch(e.currentTarget.value)} />
				<ComboBox value={regions} onChange={setRegions} items={_regions.map(region => ({ label: region, value: region.toLowerCase()}))} />
				<Button onClick={handleSearch}>Search</Button>
			</div>
			<div className="space-y-5">
				{jobs.data.map(job => (
					<JobPreview job={job} key={job.id} />
				))}
			</div>
		</>
	)
}
