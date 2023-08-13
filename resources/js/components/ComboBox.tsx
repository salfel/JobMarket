import React, {useState} from "react"
import { Command, CommandEmpty, CommandGroup, CommandInput, CommandItem } from '@/components/ui/command'
import { Popover, PopoverContent, PopoverTrigger } from '@/components/ui/popover'
import { CaretSortIcon, CheckIcon } from "@radix-ui/react-icons";
import { Button } from '@/components/ui/button'
import {cn} from "@/lib/utils";
import {ConditionalArray} from "@/lib/types";

interface Props<T extends boolean> {
	items: {
		value: string;
		label: string;
	}[],
	value?: ConditionalArray<T>,
	onChange?: (val: ConditionalArray<T>) => void,
	multiple: T,
	name?: string,
	id?: string;
	className?: string
}

export default function ComboBox<T extends boolean>({ items, value, onChange, multiple = true as T, name = 'item', ...props }: Props<T>) {
	const [open, setOpen] = useState(false);
	const [values, setValues] = useState<ConditionalArray<T>>((multiple ? []: '') as ConditionalArray<T>)
	return (
		<Popover open={open} onOpenChange={setOpen}>
			<PopoverTrigger className="flex justify-between" asChild>
				<Button {...props} variant="outline" role="combobox" aria-expanded={open} className={cn("w-52 text-start capitalize", props.className)}>
					{Array.isArray(values) && values.length > 0
						? `Selected ${values.length} ${name}${values.length === 1 ? '': 's'}`
						: multiple
							? `Select ${name}...`
							: values ?
								values
								: `Select ${name}...`					}

					<CaretSortIcon className="ml-2 h-4 w-4 shrink-0 opacity-50" />
				</Button>
			</PopoverTrigger>
			<PopoverContent className="w-52 p-0">
				<Command>
					<CommandInput placeholder="Search Regions" className="h-9" />
					<CommandEmpty>No Region found</CommandEmpty>
					<CommandGroup>
						{items.map(item => (
							<CommandItem className="capitalize" key={item.value} onSelect={currentItem => {
								if (!multiple) {
									if(values === currentItem) setValues('' as ConditionalArray<T>);
									else setValues(currentItem as ConditionalArray<T>);
									setOpen(false)
									onChange && onChange(currentItem as ConditionalArray<T>)
								}
								else {
									let items: string[] = []
									const inArray = values.includes(currentItem);
									setValues((values) => {
										if (!Array.isArray(values)) return values;
										inArray ? values.splice(values.indexOf(currentItem), 1): values.push(currentItem);
										items = values;
										return values;
									})
									setOpen(false)
									onChange && onChange(items as ConditionalArray<T>)
								}

							}}>
								{item.label}
								<CheckIcon className={cn(
									'ml-auto h-4 w-4',
									multiple && values.includes(item.value) || values === item.value ? 'opacity-100': 'opacity-0'
								)} />
							</CommandItem>
						))}
					</CommandGroup>
				</Command>
			</PopoverContent>
		</Popover>
	)
}
