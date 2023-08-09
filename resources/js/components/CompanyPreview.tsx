import React from "react"
import type { Company} from "@/lib/types";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card'
import {MapPinIcon} from "@heroicons/react/24/outline";
import { Link } from '@inertiajs/react'
import route from "ziggy-js";

interface Props {
	company: Company
}

export default function CompanyPreview({ company }: Props) {
	return (
		<Card className="flex">
			<div className="shrink-0 flex items-center pl-4">
				<img src={company.logo} alt={company.name} className="w-28 aspect-square object-contain object-center" />
			</div>
			<div>
				<CardHeader className="!pb-4">
					<CardTitle className="flex items-center justify-between">
						<Link className="text-xl pb-3" href={route('companies.show', [company.id])}>
							{company.name}
						</Link>
						<div className="flex items-center gap-1">
							<MapPinIcon className="w-5 h-5 inline-block" />
							<span className="text-base font-medium">{company.location}</span>
						</div>
					</CardTitle>

					<CardDescription className="line-clamp-3">{company.description}</CardDescription>
				</CardHeader>
				<CardContent className="font-medium">
					{company.jobs_count} Jobs available
				</CardContent>
			</div>
		</Card>
	)
}
