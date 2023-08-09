import { Card } from '@/components/ui/card'

export default function AuthLayout({ children }) {
	return (
		<div className="min-h-screen flex items-center justify-center">
			<Card>
				{children}
			</Card>
		</div>
	)
}
