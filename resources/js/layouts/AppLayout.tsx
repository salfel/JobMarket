import Header from "../components/Header";

export default function AppLayout({ children }) {
	return (
		<div className="flex flex-col min-h-screen">
			<Header />
				<div className="flex flex-col mx-auto p-3 max-w-4xl w-full grow">
					{children}
				</div>
		</div>
	)
}
