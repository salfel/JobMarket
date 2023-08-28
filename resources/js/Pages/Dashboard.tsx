import { User, Application, Company, Pagination } from "@/lib/types"
import { CardHeader, Card  } from "@/components/ui/card"
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from "@/components/ui/table"
import { Link } from '@inertiajs/react'
import { convertDate } from "@/lib/utils"
import route from "ziggy-js"
import Paginator from "@/components/Paginator"

type Props = {
	company?: Company,
	applications: Pagination<Application>,
	user: User
}

export default function Dashboard({ applications, company, user }: Props) {
	return (
		<div>
			{user?.role && (
				<AdminDashboard applications={applications} company={company as Company} />
			)}
		</div>
	)
}

function AdminDashboard({ applications, company }: { applications: Pagination<Application>, company: Company }) {
	return (
		<>
			<Table>
				<TableCaption>{company.name}'s recent Applications</TableCaption>
				<TableHeader>
					<TableRow>
						<TableHead>Job</TableHead>
						<TableHead>Location</TableHead>
						<TableHead>Employment Type</TableHead>
						<TableHead>Date</TableHead>
					</TableRow>
				</TableHeader>
				<TableBody>
					{applications.data.map(application => (
						<TableRow key={application.id}>
							<TableCell>
								<Link href={route('applications.show', [application.id as string])} className="font-medium">
									{application.name}
								</Link>
							</TableCell>
							<TableCell>{application.residence}</TableCell>
							<TableCell className="capitalize">{application.job?.employment_type}</TableCell>
							<TableCell>{convertDate(application.created_at)}</TableCell>
						</TableRow>
					))}
				</TableBody>
			</Table>
			<Paginator paginator={applications} />
		</>
	)
}

function CompanyPreview({ company }: { company: Company}) {
	return (
		<Card>
			<CardHeader>{company.name}</CardHeader>
		</Card>
	)
}

function CompanyDashboard({ companies }: { companies: Company[] }) {
	return (
		<div>
			<span className="block mb-1 text-gra-800 font-medium">Your Applications</span>
			<div className="max-w-full flex items-center gap-5 pb-3 overflow-auto">
				{companies.map(company => (
					<CompanyPreview company={company} key={company.id}/>
				))}
			</div>
		</div>
	)
}
