# Created by: Daniel O'Connor <darius@dons.net.au>
# $FreeBSD: head/net/miniupnpd/Makefile 390722 2015-06-27 19:30:34Z pgollucci $

PORTNAME=	miniupnpd
PORTVERSION=	1.9.20151118
PORTEPOCH=	1
CATEGORIES=	net
MASTER_SITES=	http://miniupnp.tuxfamily.org/files/ \
		http://miniupnp.free.fr/files/

MAINTAINER=	squat@squat.no
COMMENT=	UPnP IGD implementation which uses pf/ipf

LICENSE=	BSD3CLAUSE

USES=		cpe
CPE_VENDOR=	miniupnp_project
PLIST_FILES=	etc/miniupnpd.conf.sample sbin/miniupnpd \
		man/man8/miniupnpd.8.gz
MAKE_JOBS_UNSAFE=yes
USE_OPENSSL=	yes
USE_RC_SUBR=	miniupnpd

CFLAGS+=	-I${OPENSSLINC}
LDFLAGS+=	-L${OPENSSLLIB}

OPTIONS_DEFINE=	PF_ENABLE_FILTER_RULES CHECK_PORTINUSE IPV6 UPNP_IGDV2 UPNP_STRICT LEASEFILE
PF_ENABLE_FILTER_RULES_DESC=	Enable pf generation of filter rules
CHECK_PORTINUSE_DESC=	Check if ports are in use
IPV6_DESC=	Enable IPv6
UPNP_IGDV2_DESC=	Build an IGDv2 instead of an IGDv1
UPNP_STRICT_DESC=	Be more strict regarding compliance with UPnP specifications
LEASEFILE_DESC=	Enable lease file

PF_ENABLE_FILTER_RULES_EXTRA_PATCHES=	${PATCHDIR}/pf_enable_filter_rules.patch
CHECK_PORTINUSE_EXTRA_PATCHES=	${PATCHDIR}/enable_check_portinuse.patch
IPV6_EXTRA_PATCHES=	${PATCHDIR}/enable_ipv6.patch
UPNP_IGDV2_EXTRA_PATCHES=	${PATCHDIR}/enable_igdv2.patch
UPNP_STRICT_EXTRA_PATCHES=	${PATCHDIR}/enable_upnp_strict.patch
LEASEFILE_EXTRA_PATCHES=	${PATCHDIR}/enable_leasefile.patch

.include <bsd.port.mk>
