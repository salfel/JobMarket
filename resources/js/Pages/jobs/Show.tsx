import {Job, User} from "@/lib/types";
import {Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle} from "@/components/ui/card";
import {ClockIcon, MapPinIcon, StarIcon} from "@heroicons/react/24/outline";
import CreateApplication from "@/components/CreateApplication";
import { Head } from "@inertiajs/react";

type Props = {
    job: Job,
	user: User
}

export default function Show({ job }: Props) {
    return (
		<>
			<Head>
				<title>{job.name}</title>
			</Head>
			<Card className="mb-16">
				<CardHeader>
					<CardTitle className="flex items-center justify-between">
						<span>{job.name}</span>
						<span>{job.company.name}</span>
					</CardTitle>
				</CardHeader>
				<CardContent>
					<CardDescription>{job.description}</CardDescription>
				</CardContent>
				<CardFooter className="flex items-center gap-5">
					<div className="flex items-center gap-2">
						<StarIcon className="w-5 h-5" />
						<span className="capitalize">{job.experience_level}</span>
					</div>
					<div className="flex items-center gap-2">
						<ClockIcon className="w-5 h-5" />
						<span className="capitalize">{job.employment_type}</span>
					</div>
					<div className="flex items-center gap-2">
						<MapPinIcon className="w-5 h-5" />
						<span className="capitalize">{job.location}</span>
					</div>
				</CardFooter>
			</Card>

			{}
			<CreateApplication job={job} />
		</>
    )
}
