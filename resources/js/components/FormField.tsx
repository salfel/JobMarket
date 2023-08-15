import {Label} from "@/components/ui/label";
import {Input} from "@/components/ui/input";

type Props = {
	value: string,
	onChange: (value: string) => void,
	error: string
}

export default function FormField({ value, onChange, error }: Props) {
	return (
		<div>
			<Label className="block mb-1" htmlFor="email">Email</Label>
			<Input value={value} onChange={e => onChange(e.currentTarget.value)} id="email" placeholder="email@example.com" type="text" autoComplete="email"/>
			{error && (
				<span className="block mt-2 text-xs text-red-500">{error}</span>
			)}
		</div>
	)
}
