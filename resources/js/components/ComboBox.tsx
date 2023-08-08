import React, {useState} from "react"
import { Command, CommandEmpty, CommandGroup, CommandInput, CommandItem } from '@/components/ui/command'
import { Popover, PopoverContent, PopoverTrigger } from '@/components/ui/popover'
import { CaretSortIcon, CheckIcon } from "@radix-ui/react-icons";
import { Button } from '@/components/ui/button'
import {cn} from "@/lib/utils";

interface Props {
	items: {
		value: string;
		label: string;
	}[],
	value?: string[],
	onChange?: (val: string[]) => void
}

export default function ComboBox({ items, value = null, onChange }: Props) {
	const [open, setOpen] = useState(false);
	const [values, setValues] = useState(value ?? [])
	return (
		<Popover open={open} onOpenChange={setOpen}>
			<PopoverTrigger className="flex justify-between" asChild>
				<Button variant="outline" role="combobox" aria-expanded={open} className="w-52 text-start">
					{values.length > 0
						? `Selected ${values.length} item${values.length === 1 ? '': 's'}`
						: 'Select Region...'
					}
					<CaretSortIcon className="ml-2 h-4 w-4 shrink-0 opacity-50" />
				</Button>
			</PopoverTrigger>
			<PopoverContent className="w-52 p-0">
				<Command>
					<CommandInput placeholder="Search Regions" className="h-9" />
					<CommandEmpty>No Region found</CommandEmpty>
					<CommandGroup>
						{items.map(item => (
							<CommandItem key={item.value} onSelect={currentItem => {
								let items: string[] = [];
								const inArray = values.includes(currentItem);
								setValues(values => {
									inArray ? values.splice(values.indexOf(currentItem), 1): values.push(currentItem);
									items = values;
									return values;
								})
								setOpen(false)
								onChange && onChange(items)
							}}>
								{item.label}
								<CheckIcon className={cn(
									'ml-auto h-4 w-4',
									values.includes(item.value) ? 'opacity-100': 'opacity-0'
								)} />
							</CommandItem>
						))}
					</CommandGroup>
				</Command>
			</PopoverContent>
		</Popover>
	)
}
