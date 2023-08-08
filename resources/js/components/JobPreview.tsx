import React from "react"
import type { Job } from '@/lib/types'
import {Card, CardContent, CardHeader, CardTitle, CardFooter, CardDescription} from '@/components/ui/card'
import {ClockIcon, MapPinIcon, StarIcon} from "@heroicons/react/24/outline";
import {Link} from "@inertiajs/react";
import route from "ziggy-js";

interface Props {
	job: Job
}

export default function JobPreview({ job }: Props) {
	return (
		<Card>
			<CardHeader>
				<CardTitle>
					<Link href={route('jobs.show', [job.id])}>
						{job.name}
					</Link>
				</CardTitle>
				<CardDescription className="line-clamp-2">{job.description}</CardDescription>
			</CardHeader>
			<CardContent>
				<div className="space-x-5">
					<div className="inline-flex items-center gap-2">
						<ClockIcon className="w-5 h-5" />
						<span className="capitalize">{job.employment_type}</span>
					</div>
					<div className="inline-flex items-center gap-2">
						<StarIcon className="w-5 h-5" />
						<span className="capitalize">{job.experience_level}</span>
					</div>
					<div className="inline-flex items-center gap-2">
						<MapPinIcon className="w-5 h-5" />
						<span className="capitalize">{job.location}</span>
					</div>
				</div>
			</CardContent>
		</Card>
	)
}
