import Header from "../components/Header";

export default function AppLayout({ children }) {
	return (
		<div>
			<Header />
			<div className="flex flex-col items-center">
				<div className="py-3 px-3 max-w-4xl w-full">
					{children}
				</div>
			</div>
		</div>
	)
}
