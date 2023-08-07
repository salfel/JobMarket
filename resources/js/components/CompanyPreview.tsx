import React from "react"
import type { Company} from "@/lib/types";
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card'
import {PhoneIcon, EnvelopeIcon, GlobeAltIcon, MapPinIcon, StarIcon} from "@heroicons/react/24/outline";
import { Button } from "@/components/ui/button";
import { Link } from '@inertiajs/react'
import route from "ziggy-js";

interface Props {
	company: Company
}

export default function CompanyPreview({ company }: Props) {
	return (
		<Card>
			<CardHeader className="!pb-4">
				<CardTitle className="text-xl pb-1">
					<Link href={route('companies.show', [company.id])}>
						{company.name}
					</Link>
				</CardTitle>
				<CardDescription className="line-clamp-3">{company.description}</CardDescription>
			</CardHeader>

			<CardContent className="flex items-center gap-8">
			</CardContent>
		</Card>
	)
}
