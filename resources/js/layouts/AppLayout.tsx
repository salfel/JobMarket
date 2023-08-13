import Header from "../components/Header";
import { Toaster } from "@/components/ui/toaster";
import { usePage } from "@inertiajs/react";
import { useToast } from "@/components/ui/use-toast";
import { useEffect } from "react";

export default function AppLayout({ children }) {
	const { toast } = useToast();
	const props = usePage().props;

	useEffect(() => {
		// @ts-ignore
		const alert = props.flash.alert;
		if (alert) {
			const res = toast({
				title: 'Oops, something went wrong!',
				description: alert.message,
				variant: alert.type
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
