import { User, Application, Company, Pagination } from "@/lib/types"
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from "@/components/ui/table"
import { Link, usePage } from '@inertiajs/react'
import { convertDate } from "@/lib/utils"
import route from "ziggy-js"
import Paginator from "@/components/Paginator"
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs"

type Props = {
	company?: Company,
	applications: Pagination<Application>,
	user: User
}

export default function Dashboard({ applications, company, user }: Props) {
	return (
		<div>
			<Tabs defaultValue="applications">
				<TabsList>
					<TabsTrigger value="applications" asChild><Link href={route('dashboard')}>Dashboard</Link></TabsTrigger>
					<TabsTrigger value="settings" asChild><Link href={route('settings')}>Settings</Link></TabsTrigger>
				</TabsList>

				<TabsContent value="applications">
					{user?.role && (
						<ApplicationDashboard applications={applications} />
					)}
				</TabsContent>
			</Tabs>
		</div>
	)
}

function ApplicationDashboard({ applications }: { applications: Pagination<Application> }) {
	return (
		<>
			<h2>Recent Applications</h2>
			<Table>
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
