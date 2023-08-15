import {
	NavigationMenu,
	NavigationMenuItem,
	NavigationMenuLink,
	NavigationMenuList,
	navigationMenuTriggerStyle,
} from "@/components/ui/navigation-menu";
import {
	DropdownMenu,
	DropdownMenuContent,
	DropdownMenuItem,
	DropdownMenuSeparator,
	DropdownMenuTrigger
} from '@/components/ui/dropdown-menu'
import { UserCircleIcon } from '@heroicons/react/24/solid'
import { Link, usePage } from '@inertiajs/react'
import route from "ziggy-js";

export default function Header() {
	return (
		<header className="sticky top-0 h-16 bg-white flex items-center justify-around">
			<Link href={route('home')} className="text-2xl font-bold">JobMarket</Link>

			<NavigationMenu>
				<NavigationMenuList>
					<NavigationMenuItem>
						<NavigationMenuLink className={navigationMenuTriggerStyle()} asChild>
							<Link href={route('companies.create')}>
								Start Listing
							</Link>
						</NavigationMenuLink>
					</NavigationMenuItem>
					<NavigationMenuItem>
						<NavigationMenuLink className={navigationMenuTriggerStyle()} asChild>
							<Link href={route('jobs.index')}>
								Jobs
							</Link>
						</NavigationMenuLink>
					</NavigationMenuItem>
					<NavigationMenuItem>
						<NavigationMenuLink className={navigationMenuTriggerStyle()} asChild>
							<Link href={route('companies.index')}>
								Companies
							</Link>
						</NavigationMenuLink>
					</NavigationMenuItem>
					<NavigationMenuItem className={navigationMenuTriggerStyle()} asChild>
						{usePage().props.user ?
							(
								<DropdownMenu>
									<DropdownMenuTrigger className="flex items-center justify-center">
										<UserCircleIcon className="w-5 h-5 text-slate-800" />
									</DropdownMenuTrigger>
									<DropdownMenuContent>
										<DropdownMenuItem>
											<Link className="w-full" href={route('dashboard')}>
												Dashboard
											</Link>
										</DropdownMenuItem>
										<DropdownMenuItem>
											<Link className="w-full" href="/settings">
												Settings
											</Link>
										</DropdownMenuItem>
										<DropdownMenuSeparator />
										<DropdownMenuItem>
											<Link href={route('auth.logout')} method="post" as="button" className="w-full text-red-500 text-start">
												Logout
											</Link>
										</DropdownMenuItem>
									</DropdownMenuContent>
								</DropdownMenu>
							)
							: (
								<Link href={route('auth.login')}>Login</Link>
							)
						}

					</NavigationMenuItem>
				</NavigationMenuList>
			</NavigationMenu>
		</header>
	)
}
