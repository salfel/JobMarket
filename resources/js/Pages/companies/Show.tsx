import React from "react"
import { Card, CardFooter, CardHeader, CardTitle, CardContent, CardDescription } from '@/components/ui/card'
import type {Company, Job, Pagination} from '@/lib/types'
import {EnvelopeIcon, GlobeAltIcon, MapPinIcon, PhoneIcon} from "@heroicons/react/24/outline";
import {Button} from "@/components/ui/button";
import JobPreview from "@/components/JobPreview";
import Paginator from "@/components/Paginator";

interface Props {
	company: Company,
	jobs: Pagination<Job>
}

export default function Show({ company, jobs }: Props) {
	return (
		<>
			<Card>
				<CardHeader className="flex-row gap-3">
					<img src={company.logo} alt={company.name} className="inline-block h-20 w-20" />
					<div className="flex-1">
						<div className="flex items-center justify-between">
							<CardTitle className="">{company.name}</CardTitle>
							<div className="flex items-center gap-1">
								<MapPinIcon className="w-5 h-5" />
								<span>{company.location}</span>
							</div>
						</div>
						<div className="flex items-center gap-10 mt-1">
							<Button variant="link" className="flex items-center gap-2 p-0">
								<GlobeAltIcon className="inline-block w-5 h-5" />
								<span>{company.website}</span>
							</Button>
							<Button variant="link" className="flex items-center gap-2 p-0">
								<EnvelopeIcon className="inline-block w-5 h-5" />
								<span>{company.email}</span>
							</Button>
							<Button variant="link" className="flex items-center gap-2 p-0">
								<PhoneIcon className="inline-block w-5 h-5" />
								<span>{company.phone}</span>
							</Button>
						</div>
					</div>
				</CardHeader>
				<CardContent>
					<CardDescription>{company.description}</CardDescription>
				</CardContent>
			</Card>
			<div className="mt-10">
				<span className="block text-lg font-medium mb-5">There {jobs.total === 1 ? 'is 1 job': `are ${jobs.total} jobs`} available</span>
				<div className="space-y-5">
					{jobs.data.map(job => (
						<JobPreview job={job} key={job.id} />
					))}
				</div>
				<Paginator paginator={jobs} />
			</div>
		</>

	)
}
