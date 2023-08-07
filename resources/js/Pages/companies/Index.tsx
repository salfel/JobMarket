import React, {useState} from "react"
import type {Company, Pagination} from "@/lib/types";
import CompanyPreview from "@/components/CompanyPreview";
import Paginator from "@/components/Paginator";
import ComboBox from "@/components/ComboBox";
import { regions as _regions } from "@/lib/constants";
import { Button } from "@/components/ui/button";
import { router, usePage } from "@inertiajs/react";

interface Props {
	companies: Pagination<Company>
}

export default function Index({ companies }: Props) {
	const [regions, setRegions] = useState<string[]>([])

	const handleSearch = () => {
		const searchParams = new URLSearchParams()
		if (regions.length > 0) searchParams.set('region', regions.join(','))
		router.visit(location.pathname + '?' + searchParams.toString(), {
			only: ['companies'],
			preserveState: true
		})
	}
	return (
		<>
			<div className="flex items-center gap-5 mb-5">
				<ComboBox onChange={setRegions} items={_regions.map(region => ({ label: region, value: region.toLowerCase()}))} />
				<Button onClick={handleSearch}>Search</Button>
			</div>
			<div className="space-y-5">
				{Array.from(companies.data.values()).map(company => (
					<CompanyPreview company={company} key={company.id} />
				))}
			</div>
			<Paginator paginator={companies} />
		</>
	)
}
