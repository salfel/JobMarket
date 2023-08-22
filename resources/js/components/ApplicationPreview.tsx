import { Application } from "@/lib/types"
import { Card, CardDescription, CardHeader, CardTitle } from "./ui/card"

type Props = {
	application: Application
}

export default function Test({ application }: Props) {
	return (
		<Card className="shrink-0 max-w-80">
			<CardHeader className="!p-4">
				<CardTitle>{application.job?.name} </CardTitle>
				<CardDescription>{application.job?.company?.name}</CardDescription>
			</CardHeader>
		</Card>
    )
}
