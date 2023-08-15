import Header from "../components/Header";
import { Toaster } from "@/components/ui/toaster";
import { usePage } from "@inertiajs/react";
import { useToast } from "@/components/ui/use-toast";
import { useEffect } from "react";
import { ReactNode } from "react"

type Props = {
	children: ReactNode
}

export default function AppLayout({ children }: Props) {
	const { toast } = useToast();
	const props = usePage().props;

	useEffect(() => {
		// @ts-ignore
		const alert = props.flash.alert;
		console.log(alert)
		if (alert) {
			const res = toast({
				title: 'Oops, something went wrong!',
				description: alert.message,
				variant: alert.type === "error" ? 'destructive': 'default'
			})
		}
	}, [props])

	return (
		<div className="flex flex-col min-h-screen">
			<Header />
			<Toaster />
			<div className="flex flex-col mx-auto p-3 max-w-4xl w-full grow">
				{children}
			</div>
		</div>
	)
}
